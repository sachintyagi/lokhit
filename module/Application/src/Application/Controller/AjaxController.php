<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class AjaxController extends AbstractActionController {

    protected $membersTable;
    protected $plansDetailsTable;
    protected $plansInstallmentTable;
    protected $memberInvestmentTable;
    protected $cityTable;
    protected $statesTable;
    protected $branchTable;
    protected $employeeTable;

    public function statesAction() {
        $states = array();
        $status = false;
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost();
            $statesData = $this->getTable($this->statesTable, 'Application\Model\StateTable')->findByCountry($data['countryid']);
            foreach ($statesData as $state) {
                if (isset($data['stateid']) && $data['stateid'] == $state->id) {
                    $state->selected = true;
                } else {
                    $state->selected = false;
                }
                $states[] = (array) $state;
                $status = true;
            }
        }
        return new JsonModel(array(
            'response' => array(
                'data' => $states
            ),
            'status' => $status
        ));
    }

    public function cityAction() {
        $cities = array();
        $status = false;
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost();
            $stateId = $data['stateid'];
            $citiesData = $this->getTable($this->cityTable, 'Application\Model\CityTable')->findByState($data['stateid']);
            foreach ($citiesData as $city) {
                if (isset($data['cityid']) && $data['cityid'] == $city->id) {
                    $city->selected = true;
                } else {
                    $city->selected = false;
                }
                $cities[] = (array) $city;
                $status = true;
            }
        }
        return new JsonModel(array(
            'response' => array(
                'data' => $cities
            ),
            'status' => $status
        ));
    }

    public function palnCalculationAction() {
        $calculation = array();
        $status = false;
        $request = $this->getRequest();
        if ($request->isPost()) {
            $posts = $request->getPost();
            if ($posts->duration) {
                $palnDetails = $this->getTable($this->plansDetailsTable, 'Application\Model\PlansDetailsTable')->find($posts->duration);
                $installmentDetails = $this->getTable($this->plansInstallmentTable, 'Application\Model\PlanInstallmentsTable')->find($posts->installment_type_id);
                if ($palnDetails && trim($posts->ammount)) {
                    if ($palnDetails->duration_type == 'M') { //print_r($installmentDetails); exit;	
                        $A = 0;
                        $P = trim($posts->ammount);
                        $year = $palnDetails->duration / 12;
                        $rate = $palnDetails->interest_rate;
                        $n = $installmentDetails->value;

                        if ($palnDetails->plan_id == 1) {
                            $A = $this->fDInterest($P, $year, $rate, $n);
                        } else if ($palnDetails->plan_id == 2) {
                            $A = $this->rDInterest($P, $year, $rate, $n);
                        }

                        $calculation = array(
                            'principal' => $P,
                            'years' => $year,
                            'roi' => $rate,
                            'ammount' => \round($A, 2),
                            'compounded_per_year' => $n,
                            'start_date' => date('Y-m-d'),
                            'end_date' => date('Y-m-d', \strtotime("+" . $palnDetails->duration . " months", \strtotime(date('Y-m-d')))),
                        );
                    } else {
                        $calculation = array();
                    }
                    $status = true;
                }
            } else {
                $calculation = array();
            }
        }
        return new JsonModel(array(
            'response' => array(
                'data' => $calculation
            ),
            'status' => $status
        ));
    }

    public function memberAction() {
        $members = array();
        $status = false;
        $request = $this->getRequest();
        if ($request->isPost()) {
            $posts = $request->getPost();
            $members = $this->getTable($this->membersTable, 'Application\Model\MemberTable')->findByMemberId(trim($posts->code));
            if (!$members) {
                $members = array();
            } else {
                $status = true;
            }
        }
        return new JsonModel(array(
            'response' => array(
                'data' => $members
            ),
            'status' => $status
        ));
    }

    public function investmentDetailsAction() {
        $investment = array();
        $status = false;
        $request = $this->getRequest();
        if ($request->isPost()) {
            $posts = $request->getPost();
            $memberInvestments = $this->getTable($this->memberInvestmentTable, 'Application\Model\MemberInvestmentsTable')->findByCFNumber(trim($posts->cf_number));
            if (!$memberInvestments) {
                $investment = array();
            } else {
                $investment = array(
                    'investment_id' => $memberInvestments->id,
                    'plan_id' => $memberInvestments->plan_id,
                    'period' => $memberInvestments->period,
                    'interest_rate' => $memberInvestments->interest_rate . ' %',
                    'installment_no' => $memberInvestments->installment_no + 1,
                    'installment_date' => $memberInvestments->installment_date,
                    'total_installment' => $memberInvestments->total_installment,
                    'ammount' => $memberInvestments->start_ammount,
                );
                $status = true;
            }
        }
        return new JsonModel(array(
            'response' => array(
                'data' => $investment
            ),
            'status' => $status
        ));
    }

    public function planDurationAction() {
        $status = false;
        $palnDurationData = array();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $posts = $request->getPost();
            $palnDetails = $this->getTable($this->plansDetailsTable, 'Application\Model\PlansDetailsTable')->planDurationByPlanId($posts->id);
            if ($palnDetails) {
                foreach ($palnDetails as $palns) {
                    $palnDurationData[] = (array) $palns;
                }
                $status = true;
            }
        }

        return new JsonModel(array(
            'response' => array(
                'data' => $palnDurationData,
            ),
            'status' => $status
        ));
    }

    public function planInstallmentAction() {
        $status = false;
        $palnInstallmentsData = array();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $posts = $request->getPost();
            $palnDetails = $this->getTable($this->plansDetailsTable, 'Application\Model\PlansDetailsTable')->planInstallmentByPlanId($posts->id, $posts->duration);
            if ($palnDetails) {
                foreach ($palnDetails as $palns) {
                    $palnInstallmentsData[] = (array) $palns;
                }
                $status = true;
            }
        }

        return new JsonModel(array(
            'response' => array(
                'data' => $palnInstallmentsData,
            ),
            'status' => $status
        ));
    }

    public function planAmmountAction() {
        $status = false;
        $planAmmountData = array();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $posts = $request->getPost();
            $palnFormulaDetails = $this->getTable($this->plansDetailsTable, 'Application\Model\PlanFormulaTestTable')->planAmmountByPlanDetailsId($posts->id);
            if ($palnFormulaDetails) {
                foreach ($palnFormulaDetails as $palnsFormula) {
                    $planAmmountData[$palnsFormula->amount] = (array) $palnsFormula;
                }
                $status = true;
            }
        }
        asort($planAmmountData);
        //print_r($planAmmountData); exit;
        return new JsonModel(array(
            'response' => array(
                'data' => $planAmmountData,
            ),
            'status' => $status
        ));
    }

    public function planAmmountDetailsAction() {
        $status = false;
        $planAmmountData = array();
        $installmentdate = null;
        $maturitydate = null;

        $request = $this->getRequest();
        if ($request->isPost()) {
            $posts = $request->getPost();
            $palnFormulaDetails = $this->getTable($this->plansDetailsTable, 'Application\Model\PlanFormulaTestTable')->planAmmountById($posts->id);
            if ($palnFormulaDetails) {
                $status = true;
                if ($palnFormulaDetails->duration_type == 'M') {
                    $maturitydate = date('Y-m-d H:i:s', strtotime('+' . $palnFormulaDetails->duration . ' Month'));
                } else {
                    $maturitydate = date('Y-m-d H:i:s', strtotime('+' . $palnFormulaDetails->duration . ' Day'));
                }
                if ($palnFormulaDetails->installment_type == 'Per Day (180)') {
                    $installmentdate = 'Everyday';
                } else if ($palnFormulaDetails->installment_type == 'Per Day') {
                    $installmentdate = 'Everyday';
                } else if ($palnFormulaDetails->installment_type == 'Yearly') {
                    $installmentdate = date('jS M') . ' of every year';
                } else if ($palnFormulaDetails->installment_type == 'Half Yearly') {
                    $installmentdate = date('jS M') . ', ' . date('jS M', strtotime('+6 Month')) . ' of every year';
                } else if ($palnFormulaDetails->installment_type == 'Quaterly') {
                    $installmentdate = date('jS M') . ', ' . date('jS M', strtotime('+3 Month')) . ', ' . date('jS M', strtotime('+6 Month')) . ', ' . date('jS M', strtotime('+9 Month')) . ' of every year';
                } else if ($palnFormulaDetails->installment_type == 'Monthly') {
                    $installmentdate = date('jS') . ' of every month';
                } else if ($palnFormulaDetails->installment_type == 'One Time') {
                    $installmentdate = 'One Time';
                }
            }
        }

        return new JsonModel(array(
            'response' => array(
                'data' => $palnFormulaDetails,
                'installment_date' => $installmentdate,
                'end_date' => $maturitydate,
            ),
            'status' => $status
        ));
    }

    public function planDetailsAction() {
        $palnData = array();
        $status = false;
        $installments = array();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $posts = $request->getPost();
            if ($posts->type == 'plan') {
                $palnDetails = $this->getTable($this->plansDetailsTable, 'Application\Model\PlansDetailsTable')->findByPlanId($posts->id);
                //
                if ($palnDetails) {
                    foreach ($palnDetails as $palns) {
                        $palnData[] = (array) $palns;
                    }
                    $planinstallments = $this->getTable($this->plansInstallmentTable, 'Application\Model\PlanInstallmentsTable')->findByPlanId($posts->id);
                    foreach ($planinstallments as $installment) {
                        $installments[] = $installment;
                    }
                    $status = true;
                } else {
                    $status = false;
                }
            } else {
                $palnDetails = $this->getTable($this->plansDetailsTable, 'Application\Model\PlansDetailsTable')->find($posts->id);
                if ($palnDetails) {
                    $palnData = (array) $palnDetails;
                    $status = true;
                } else {
                    $status = false;
                }
            }
        }
        return new JsonModel(array(
            'response' => array(
                'data' => $palnData,
                'installments' => $installments,
            ),
            'status' => $status
        ));
    }

    public function stateAction() {
        $request = $this->getRequest();
        $stateHtml = '<option value="" >Choose one</option>';
        if ($request->isPost()) {
            $data = $request->getPost();
            $countryId = $data['countryid'];
            $stateId = $data['stateid'];
            $states = $this->getTable($this->stateTable, 'Application\Model\StateTable')->findByCountry($countryId);
            foreach ($states as $key => $state) {
                if ($state->id == $stateId) {
                    $stateHtml .= '<option value="' . $state->id . '" selected="selected">' . $state->name . '</option>';
                } else {
                    $stateHtml .= '<option value="' . $state->id . '" >' . $state->name . '</option>';
                }
            }
        }
        echo $stateHtml;
        exit;
    }

    public function branchAction() {
        $request = $this->getRequest();
        $branchHtml = '<option value="" >Choose one</option>';
        if ($request->isPost()) {
            $data = $request->getPost();
            $companyId = $data['companyid'];
            $branchId = $data['branchid'];
            $branches = $this->getTable($this->branchTable, 'Company\Model\BranchTable')->findByCompany($companyId);
            foreach ($branches as $key => $branch) {
                if ($branch->id == $branchId) {
                    $branchHtml .= '<option value="' . $branch->id . '" selected="selected">' . $branch->name . '</option>';
                } else {
                    $branchHtml .= '<option value="' . $branch->id . '" >' . $branch->name . '</option>';
                }
            }
        }
        echo $branchHtml;
        exit;
    }

    public function membersAction() {
        $length = $this->getRequest()->getQuery('length', 10);
        $offset = $this->getRequest()->getQuery('start', 0);
        $search['value'] = trim($this->getRequest()->getQuery('term', $this->getRequest()->getQuery('q'), null));
        $order = $this->getRequest()->getQuery('order', null);
        $conditions = array(
            'fields' => array('*'),
            'filters' => array(),
            'joins' => array(),
            'limit' => (int) $length,
            'offset' => (int) $offset,
            'search' => array()
        );
        if (!empty($search['value'])) {
            $conditions['search'] = array(
                'term' => $search['value'],
                'fields' => array('member_id'),
                'type' => 'AND'
            );
        }
        $auth = $this->getServiceLocator()->get('AuthService');
        $authData = $auth->getIdentity();
        $conditions['filters'][] = array('members.branch_id' => $authData->branch->id);
        $conditions['filters'][] = array('members.status' => 1);
        $conditions['filters'][] = array('members.is_deleted' => 0);
        //print_r($conditions); exit;
        $members = $this->getTable($this->membersTable, 'Application\Model\MemberTable')->fetchAll($conditions);
        $data = array();
        foreach ($members as $member) {
            $data[] = array(
                'id' => $member->id,
                'label' => $member->firstname . ' ' . $member->lastname,
                'value' => $member->member_id
            );
        }
        return new JsonModel($data);
    }

    public function introducersAction() {
        $length = $this->getRequest()->getQuery('length', 10);
        $offset = $this->getRequest()->getQuery('start', 0);
        $search['value'] = trim($this->getRequest()->getQuery('term', $this->getRequest()->getQuery('q'), null));
        $order = $this->getRequest()->getQuery('order', null);
        $conditions = array(
            'fields' => array('*'),
            'filters' => array(),
            'joins' => array(),
            'limit' => (int) $length,
            'offset' => (int) $offset,
            'search' => array()
        );
        if (!empty($search['value'])) {
            $conditions['search'] = array(
                'term' => $search['value'],
                'fields' => array('employee_code'),
                'type' => 'AND'
            );
        }
        $auth = $this->getServiceLocator()->get('AuthService');
        $authData = $auth->getIdentity();
        $conditions['filters'][] = array('employees.branch_id' => $authData->branch->id);
        $conditions['filters'][] = array('employees.is_deleted' => 0);
        $employees = $this->getTable($this->employeeTable, 'Application\Model\EmployeeTable')->fetchAll($conditions);
        $data = array();
        $data[] = array(
            'id' => 1,
            'label' => 'LMS',
            'value' => 100000000000
        );
        foreach ($employees as $employee) {
            if ($employee->id == 1) {
                continue;
            }
            $data[] = array(
                'id' => $employee->id,
                'label' => $employee->firstname . ' ' . $employee->lastname,
                'value' => $employee->employee_code
            );
        }
        return new JsonModel($data);
    }

    function fDInterest($investment, $year, $rate, $n) {
        /** Formula A = P(1 + (r*n) * */
        $rate = $rate / 100;
        $accumulated = 0;
        while ($year > 0) {
            $accumulated = $investment * (1 + ($rate * $n));
            $investment = round($accumulated);
            $year--;
        }
        return $accumulated;
    }

    function rDInterest($R, $t, $r, $n) {
        /** Formula Used: 
          M = R((1+i)^n -1) / (1-(1+i)^ -1/3)
          Where, M = Maturity value  R = Monthly Installment  r = Rate of Interest (i) / 400  n = Number of Quarters* */
        $i = $r / 400;
        return round($R * round((pow(($i + 1), $n) - 1) / (1 - pow(($i + 1), (-1 / $t))), 1));
    }

    public function getTable($table, $name) {
        if (!$table) {
            $sm = $this->getServiceLocator();
            $table = $sm->get($name);
        }
        return $table;
    }

}
