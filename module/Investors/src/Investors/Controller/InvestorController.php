<?php

namespace Investors\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Investors\Form\InvestorForm;
use Investors\Form\Filter\InvestorFilter;

class InvestorController extends AbstractActionController {

    protected $memberTable;
    protected $plansTable;
    protected $employeeTable;
    protected $plansDetailsTable;
    protected $memberInvestmentsTable;
    protected $memberInstallmentsTable;

    public function listAction() {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $draw = $this->getRequest()->getQuery('draw', 1);
            $length = $this->getRequest()->getQuery('length', 10);
            $offset = $this->getRequest()->getQuery('start', 0);
            $search = $this->getRequest()->getQuery('search', null);
            $order = $this->getRequest()->getQuery('order', null);
            $conditions = array(
                'fields' => array(
                    'id',
                    'start_ammount',
                    'final_ammount',
                    'start_date',
                    'end_date',
                    'cf_number',
                    'period',
                    'interest_rate',
                    'repayable_to',
                    'installment_type',
                    'installment_no',
                    'installment_date',
                    'last_installment_date',
                    'employee_code',
                    'total_installment',
                ),
                'filters' => array(),
                'joins' => array(
                    array(
                        'table' => 'members',
                        'mapping' => 'member_investments.member_id = members.member_id',
                        'fields' => array('firstname', 'lastname', 'member_id', 'emailid', 'gardian_name', 'address', 'nominee_name', 'nominee_relation', 'dob')
                    )
                ),
                'limit' => (int) $length,
                'offset' => (int) $offset,
                'search' => array()
            );
            if (!empty($search['value'])) {
                $conditions['search'] = array(
                    'term' => $search['value'],
                    'fields' => array('cf_number', 'employee_code', 'firstname', 'lastname', 'member_investments.member_id', 'final_ammount')
                );
            }
            $auth = $this->getServiceLocator()->get('AuthService');
            $authData = $auth->getIdentity();
            $roleId = $authData->role_id;
            $conditions['filters'][] = array('member_investments.branch_id' => $authData->branch->id);
            $conditions['filters'][] = array('member_investments.is_deleted' => 0);

            $investments = $this->getTable($this->memberInvestmentsTable, 'Application\Model\MemberInvestmentsTable')->fetchAll($conditions);
            $investmentsTotal = $this->getTable($this->memberInvestmentsTable, 'Application\Model\MemberInvestmentsTable')->fetchTotal($conditions);
            $data = array();
            foreach ($investments as $investment) {
                $data[] = array(
                    $investment->id,
                    $investment->cf_number,
                    $investment->employee_code,
                    $investment->firstname . ' ' . $investment->lastname,
                    $investment->member_id,
                    $investment->final_ammount,
                    date('d M, y', strtotime($investment->end_date)),
                    '&nbsp;&nbsp;&nbsp;<a title="Print Certificate" href="' . $this->getServiceLocator()->get('Request')->getBasePath() . '/reports/certificate/' . $investment->id . '"><i class="glyphicon glyphicon-print"></i></a>
                    &nbsp;| <a title="Renew" href="' . $this->getServiceLocator()->get('Request')->getBasePath() . '/investors/new-installment/' . $investment->id . '"><i class="glyphicon glyphicon-repeat"></i></a>',
                );
            }
            return new JsonModel(
                    array(
                "draw" => (int) $draw,
                "recordsTotal" => (int) $investmentsTotal->count(),
                "recordsFiltered" => (int) $investmentsTotal->count(),
                "data" => $data,
                    )
            );
        }
        return new ViewModel(array());
    }

    public function newAction() {
        $auth = $this->getServiceLocator()->get('AuthService');
        $authData = $auth->getIdentity();
        $investorId = $this->params()->fromRoute('id', 0);
        $investorForm = new InvestorForm();
        $investorForm->setInputFilter(new InvestorFilter());
        $request = $this->getRequest();
        if ($request->isPost()) {
            $posts = $request->getPost();
            $investorForm->setData($posts);
            $investorForm->get('plan_id')->setDisableInArrayValidator(true);
            $investorForm->get('duration')->setDisableInArrayValidator(true);
            $investorForm->get('installment_type')->setDisableInArrayValidator(true);
            $investorForm->get('start_ammount')->setDisableInArrayValidator(true);
            //$investorForm->get('employee_code')->setDisableInArrayValidator(true);
            if ($investorForm->isValid()) {
                try {
                    $this->getAdapter()->getDriver()->getConnection()->beginTransaction();
                    $investmentTable = $this->getTable($this->memberInvestmentsTable, 'Application\Model\MemberInvestmentsTable');
                    $installmentTable = $this->getTable($this->memberInvestmentsTable, 'Application\Model\MemberInstallmentsTable');
                    if(isset($posts->custom_ammount) && $posts->custom_ammount) {
                        $palnDetails = $this->getTable($this->plansDetailsTable, 'Application\Model\PlansDetailsTable')->planInstallmentByPlanId($posts->plan_id, $posts->duration);
                        $palnDetails = $palnDetails->current();
                        $palnDetails->plan_details_id = $palnDetails->id;
                        $palnDetails->maturity_ammount = $posts->final_ammount;
                        $palnDetails->amount = $posts->custom_ammount;
                        $palnDetails->deposit_amount = $posts->custom_ammount;
                    } else {
                        $palnDetails = $this->getTable($this->plansDetailsTable, 'Application\Model\PlanFormulaTestTable')->planAmmountById($posts->formula_id);
                    }
                    $paln = $this->getTable($this->plansTable, 'Application\Model\PlansTable')->find($palnDetails->plan_id);
                    $maxData = $investmentTable->findMaxId();
                    $totalInstallmant = 1;
                    $lastInstallmentDate = null;
                    if ($palnDetails->installment_type == 'One Time') {
                        $totalInstallmant = 1;
                        $lastInstallmentDate = date('Y-m-d');
                    } else if ($palnDetails->installment_type == 'Per Day') {
                        $totalInstallmant = 365;
                        $lastInstallmentDate = $posts->end_date;
                    } else if ($palnDetails->installment_type == 'Per Day (180)') {
                        $totalInstallmant = 180;
                        $lastInstallmentDate = $posts->end_date;
                    } else if ($palnDetails->installment_type == 'Monthly') {
                        $totalInstallmant = $palnDetails->duration;
                        $lastInstallmentDate = date('Y-m-d', strtotime('-1 month', strtotime($posts->end_date)));
                    } else if ($palnDetails->installment_type == 'Quaterly') {
                        $totalInstallmant = $palnDetails->duration / 3;
                        $lastInstallmentDate = date('Y-m-d', strtotime('-3 month', strtotime($posts->end_date)));
                    } else if ($palnDetails->installment_type == 'Half Yearly') {
                        $totalInstallmant = $palnDetails->duration / 6;
                        $lastInstallmentDate = date('Y-m-d', strtotime('-6 month', strtotime($posts->end_date)));
                    } else if ($palnDetails->installment_type == 'Yearly') {
                        $totalInstallmant = $palnDetails->duration / 12;
                        $lastInstallmentDate = date('Y-m-d', strtotime('-12 month', strtotime($posts->end_date)));
                    }

                    $investmentData = array(
                        'branch_id' => $authData->branch->id,
                        'member_id' => $posts->member_id,
                        'plan_id' => $palnDetails->plan_id,
                        'plan_details_id' => $palnDetails->plan_details_id,
                        'cf_number' => $paln->name . $palnDetails->duration . $palnDetails->duration_type . sprintf('%08d', $maxData->max_id),
                        'period' => ($palnDetails->duration_type == 'M') ? ($palnDetails->duration . ' Months') : ($palnDetails->duration . ' Days'),
                        'interest_rate' => $palnDetails->interest_rate,
                        'repayable_to' => 'Self',
                        'installment_type' => $palnDetails->installment_type,
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
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_by' => $authData->id,
                    );
                    $investmentId = $investmentTable->save($investmentData);
                    $maxIdData = $installmentTable->findMaxId($authData->branch->id);
                    $maxId = $maxIdData->max_id;
                    $maxId = $maxId + 1;
                    $installment = array(
                        'investment_id' => $investmentId,
                        'ammount' => $palnDetails->amount,
                        'receipt_number' => $authData->branch->code.$investmentId.date('dmY').$maxId,
                        'installment_number'=> 1,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    $installmentTable->save($installment);
                    $this->getAdapter()->getDriver()->getConnection()->commit();
                    //$this->flashMessenger()->addMessage('Member investment added successfully', 'success');	
                    return $this->redirect()->toRoute('certificate', array('id' => $investmentId));
                } catch (\Exception $e) {
                    $this->getAdapter()->getDriver()->getConnection()->rollback();
                    //throw new \Exception($e->getMessage());
                    $this->flashMessenger()->addMessage('Oops! there are some error (' . $e->getMessage() . ') with this process. Please try after some time', 'error');
                    return $this->redirect()->toRoute('new-investors');
                }
            }
        }
        $basePath = $this->getServiceLocator()->get('Request')->getBasePath();
        $this->getServiceLocator()->get('viewhelpermanager')->get('headLink')->appendStylesheet($basePath . '/css/jquery-ui.css');
        $this->getServiceLocator()->get('viewhelpermanager')->get('headScript')->appendFile($basePath . '/js/jquery-ui.js');
        return new ViewModel(array(
            'investorForm' => $investorForm,
                )
        );
    }

    public function deleteAction() {
        $memberId = $this->params()->fromRoute('id', 0);
        $member = $this->getTable($this->memberTable, 'Application\Model\MemberTable')->delete($memberId);
        $this->redirect()->toRoute('members');
    }

    public function getAdapter() {
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
