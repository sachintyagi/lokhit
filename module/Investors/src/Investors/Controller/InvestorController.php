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
	protected $plansDetailsTable;	
	protected $memberInvestmentsTable;
	protected $memberInstallmentsTable;
		
    public function listAction()
    {		
		$investments = $this->getTable($this->memberInvestmentsTable,'Application\Model\MemberInvestmentsTable')->findInvestors('1');
		return new ViewModel(array(
			'investments' => $investments
		));
    }
	
	public function newAction()
    {
		$investorId = $this->params()->fromRoute('id',0);
		$investorForm = new InvestorForm();
		$investorForm->setInputFilter(new InvestorFilter());
		$request = $this->getRequest();
		if($request->isPost()) {
			$posts = $request->getPost();
			$investorForm->setData($posts);	
			$investorForm->get('plan_id')->setDisableInArrayValidator(true);
			$investorForm->get('duration')->setDisableInArrayValidator(true);
			$investorForm->get('installment_type')->setDisableInArrayValidator(true);
			$investorForm->get('start_ammount')->setDisableInArrayValidator(true);
			if($investorForm->isValid()) {
				$investmentTable = $this->getTable($this->memberInvestmentsTable,'Application\Model\MemberInvestmentsTable');
				$installmentTable = $this->getTable($this->memberInvestmentsTable,'Application\Model\MemberInstallmentsTable');
				$palnDetails = $this->getTable($this->plansDetailsTable,'Application\Model\PlanFormulaTestTable')->planAmmountById($posts->duration);
				$paln = $this->getTable($this->plansTable,'Application\Model\PlansTable')->find($posts->plan_id);
				$maxData = $investmentTable->findMaxId();
				try{
					$this->getAdapter()->getDriver()->getConnection()->beginTransaction();
					$totalInstallmant = 1;
					if($palnDetails->installment_type = 'One Time') {
						$totalInstallmant = 1;
					} else if($palnDetails->installment_type = 'Per Day') {
						$totalInstallmant = 365;
					} else if($palnDetails->installment_type = 'Monthly') {
						$totalInstallmant = $palnDetails->duration;
					} else if($palnDetails->installment_type = 'Quaterly') {
						$totalInstallmant = $palnDetails->duration/3;
					} else if($palnDetails->installment_type = 'Half Yearly') {
						$totalInstallmant = $palnDetails->duration/6;
					} else if($palnDetails->installment_type = 'Yearly') {
						$totalInstallmant = $palnDetails->duration/12;
					}
					
					$investment = array(
						'branch_id' => $posts->branch_id,
						'member_id' => $posts->member_id,
						'plan_id' => $posts->plan_id,
						'plan_details_id' => $posts->duration,
						'cf_number' => $paln->name.'-'.$palnDetails->duration.$palnDetails->duration_type.'-'.sprintf('%08d',$maxData->max_id),
						'period' => ($palnDetails->duration_type=='M')?($palnDetails->duration.' Months'):($palnDetails->duration.' Days'),	
						'interest_rate' => $palnDetails->interest_rate,
						'repayable_to' => 'Self',
						'installment_type_id' => $posts->installment_type,
						'installment_no' => 1,
						'installment_date' => $posts->installment_date,
						'total_installment' => 1,
						'final_ammount' => $palnDetails->maturity_ammount,
						'start_ammount' => $posts->installment_ammount,
						'deposit_amount' => $palnDetails->deposit_amount,
						'start_date' => $posts->start_date,
						'end_date' => $posts->end_date,
					);				
					$investmentId = $investmentTable->save($investment);
					$installment = array(
						'investment_id' => $investmentId,
						'ammount' => $posts->installment_ammount,
						'status' => 1,
						'created_at'=> date('Y-m-d H:i:s')
					);
					$installmentTable->save($installment);
					$this->getAdapter()->getDriver()->getConnection()->commit();				
				} catch(\Exception $e){
					$this->getAdapter()->getDriver()->getConnection()->rollback();
					throw new \Exception($e);
				}
				return $this->redirect()->toRoute('certificate',array('id'=>$investmentId));
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
