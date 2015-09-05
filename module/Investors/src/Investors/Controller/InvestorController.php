<?php

namespace Investors\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Investors\Form\InvestorForm;
use Investors\Form\Filter\InvestorFilter;

class InvestorController extends AbstractActionController
{
	protected $memberTable;
	protected $plansTable;
	protected $employeeTable;
	protected $plansDetailsTable;	
	protected $memberInvestmentsTable;
	protected $memberInstallmentsTable;
		
    public function listAction()
    {		
            $auth = $this->getServiceLocator()->get('AuthService');
            $authData = $auth->getIdentity();
            if($authData->role_id == 1 || $authData->role_id == 2) {
                $investments = $this->getTable($this->memberInvestmentsTable,'Application\Model\MemberInvestmentsTable')->findInvestors(null, null);
            } else {
                $investments = $this->getTable($this->memberInvestmentsTable,'Application\Model\MemberInvestmentsTable')->findInvestors(null, $authData->branch->id);
            }
            return new ViewModel(array(
                'investments' => $investments
            ));
    }
	
    public function newAction()
    {
        $auth = $this->getServiceLocator()->get('AuthService');
        $authData = $auth->getIdentity();
        $investorId = $this->params()->fromRoute('id',0);
        $investorForm = new InvestorForm();
        $investorForm->setInputFilter(new InvestorFilter());
        $request = $this->getRequest();
        if($authData->role_id == 1 || $authData->role_id == 2) {
            $employees = $this->getTable($this->employeeTable,'Application\Model\EmployeeTable')->fetchAllAsArray($authData->branch->company_id);
        } else {
            $employees = $this->getTable($this->employeeTable,'Application\Model\EmployeeTable')->fetchAllAsArray($authData->branch->company_id);
        }
        $investorForm->get('employee_code')->setValueOptions($employees);
        
        if($request->isPost()) {
            $posts = $request->getPost();
            $investorForm->setData($posts);	
            $investorForm->get('plan_id')->setDisableInArrayValidator(true);
            $investorForm->get('duration')->setDisableInArrayValidator(true);
            $investorForm->get('installment_type')->setDisableInArrayValidator(true);
            $investorForm->get('start_ammount')->setDisableInArrayValidator(true);
            $investorForm->get('employee_code')->setDisableInArrayValidator(true);
            if($investorForm->isValid()) {	
                try{
                    $this->getAdapter()->getDriver()->getConnection()->beginTransaction();
                    $investmentTable = $this->getTable($this->memberInvestmentsTable,'Application\Model\MemberInvestmentsTable');
                    $installmentTable = $this->getTable($this->memberInvestmentsTable,'Application\Model\MemberInstallmentsTable');
                    $palnDetails = $this->getTable($this->plansDetailsTable,'Application\Model\PlanFormulaTestTable')->planAmmountById($posts->formula_id);					
                    $paln = $this->getTable($this->plansTable,'Application\Model\PlansTable')->find($palnDetails->plan_id);
                    $maxData = $investmentTable->findMaxId();
                    $totalInstallmant = 1;
                    $lastInstallmentDate = null;
                    if($palnDetails->installment_type == 'One Time') {
                        $totalInstallmant = 1;
                        $lastInstallmentDate = date('Y-m-d');
                    } else if($palnDetails->installment_type == 'Per Day') {
                        $totalInstallmant = 365;
                        $lastInstallmentDate = $posts->end_date;
                    } else if($palnDetails->installment_type == 'Monthly') {
                        $totalInstallmant = $palnDetails->duration;
                        $lastInstallmentDate = date('Y-m-d',strtotime('-1 month',strtotime($posts->end_date)));
                    } else if($palnDetails->installment_type == 'Quaterly') {
                        $totalInstallmant = $palnDetails->duration/3;
                        $lastInstallmentDate = date('Y-m-d',strtotime('-3 month',strtotime($posts->end_date)));
                    } else if($palnDetails->installment_type == 'Half Yearly') {
                        $totalInstallmant = $palnDetails->duration/6;
                        $lastInstallmentDate = date('Y-m-d',strtotime('-6 month',strtotime($posts->end_date)));
                    } else if($palnDetails->installment_type == 'Yearly') {
                        $totalInstallmant = $palnDetails->duration/12;
                        $lastInstallmentDate = date('Y-m-d',strtotime('-12 month',strtotime($posts->end_date)));
                    }

                    $investmentData = array(
                        'branch_id' => $authData->branch_id,
                        'member_id' => $posts->member_id,
                        'plan_id' => $palnDetails->plan_id,
                        'plan_details_id' => $palnDetails->plan_details_id,
                        'cf_number' => $paln->name.$palnDetails->duration.$palnDetails->duration_type.sprintf('%08d',$maxData->max_id),
                        'period' => ($palnDetails->duration_type=='M')?($palnDetails->duration.' Months'):($palnDetails->duration.' Days'),	
                        'interest_rate' => $palnDetails->interest_rate,
                        'repayable_to' => 'Self',
                        'installment_type' => $palnDetails->installment_type ,
                        'installment_no' => 1,
                        'installment_date' => $posts->installment_date,
                        'total_installment' => $totalInstallmant,
                        'last_installment_date' => $lastInstallmentDate,
                        'final_ammount' => $palnDetails->maturity_ammount,
                        'start_ammount' => $palnDetails->amount,
                        'deposit_amount' => $palnDetails->deposit_amount,
                        'start_date' => $posts->start_date,
                        'employee_code' => $posts->employee_code,
                        'end_date' => $posts->end_date,
                        'created_by' => $authData->id,
                        'created_at'=> date('Y-m-d H:i:s'),
                        'updated_by'=> $authData->id,						
                    );					
                    $investmentId = $investmentTable->save($investmentData);
                    $installment = array(
                        'investment_id' => $investmentId,
                        'ammount' => $palnDetails->amount,
                        'status' => 1,
                        'created_at'=> date('Y-m-d H:i:s')
                    );
                    $installmentTable->save($installment);
                    $this->getAdapter()->getDriver()->getConnection()->commit();	
                    //$this->flashMessenger()->addMessage('Member investment added successfully', 'success');	
                    return $this->redirect()->toRoute('certificate',array('id'=>$investmentId));
                } catch(\Exception $e){
                    $this->getAdapter()->getDriver()->getConnection()->rollback();
                    $this->flashMessenger()->addMessage('Oops! there are some error ('.$e->getMessage().') with this process. Please try after some time', 'error');	
                    return $this->redirect()->toRoute('new-investors');
                }				
            }			
        }	

        return new ViewModel(array(
                'investorForm'	=> $investorForm,
            )
        );
    }
	
	public function deleteAction()
    {
		$memberId = $this->params()->fromRoute('id',0);
		$member = $this->getTable($this->memberTable,'Application\Model\MemberTable')->delete($memberId);
        $this->redirect()->toRoute('members');
    }
	
	public function getAdapter(){
		return $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
	}
	
	public function getTable($table, $name) {
        if (!$table) {
            $sm = $this->getServiceLocator();
            $table = $sm->get($name);
        }
        return $table;
    }
}
