<?php

namespace Employee\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Employee\Form\EmployeeForm;
use Employee\Form\Filter\EmployeeFilter;
use Application\Service\Upload;

class IndexController extends AbstractActionController {

    protected $countryTable;
    protected $companyTable;
    protected $roleTable;
    protected $employeeTable;
    protected $branchTable;
    protected $branchsTable;

    public function __construct() {
        
    }

    function indexAction() {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $draw = $this->getRequest()->getQuery('draw', 1);
            $length = $this->getRequest()->getQuery('length', 10);
            $offset = $this->getRequest()->getQuery('start', 0);
            $search = $this->getRequest()->getQuery('search', null);
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
                    'fields' => array('employee_code', 'firstname', 'lastname', 'emailid', 'userid','mobile_number','gender')
                );
            }
            $auth = $this->getServiceLocator()->get('AuthService');
            $authData = $auth->getIdentity();
            $roleId = $authData->role_id;
            if ($roleId == 1 || $roleId == 2) {
                
            } else {
                $conditions['filters'][] = array('employees.branch_id' => $authData->branch->id);
                $conditions['filters'][] = array('employees.is_deleted' => 0);
            }
            $employees = $this->getTable($this->employeeTable, 'Application\Model\EmployeeTable')->fetchAll($conditions);
            $employeesTotal = $this->getTable($this->employeeTable, 'Application\Model\EmployeeTable')->fetchTotal($conditions);
            $data = array();
            $basePath = $this->getServiceLocator()->get('Request')->getBasePath();
            foreach ($employees as $employee) {
                $data[] = array(
                    $employee->id,
                    $employee->employee_code,
                    $employee->firstname . ' ' . $employee->lastname,
                    $employee->emailid,                    
                    $employee->userid,
                    $employee->mobile_number,
                    $employee->gender,
                    '<a title="Edit" href="'.$this->getServiceLocator()->get('Request')->getBasePath().'/employee/new/'.$employee->id.'"><i class="glyphicon glyphicon-edit"></i></a> | <a title="Delete" onclick="deleteEmployee('.$employee->id.')" href="javascript:void(0);"><i class="glyphicon glyphicon-remove-sign"></i></a>',
                );
            }
            return new JsonModel(array(
                "draw" => (int) $draw,
                "recordsTotal" => (int) $employeesTotal->count(),
                "recordsFiltered" => (int) $employeesTotal->count(),
                "data" => $data,
               )
            );
        }
        return new ViewModel(array());
    }

    function newAction() {
        $employeeId = $this->params()->fromRoute('id', 0);
        $employeeForm = new EmployeeForm($this->getServiceLocator());
        $employeeForm->setInputFilter(new EmployeeFilter($this->getServiceLocator()));
        $request = $this->getRequest();

        $auth = $this->getServiceLocator()->get('AuthService');
        $authData = $auth->getIdentity();
        $branches = $this->getTable($this->branchsTable, 'Application\Model\BranchsTable')->fetchAllAsArray($authData->branch->company_id);
        $employeeForm->get('branch_id')->setValueOptions($branches);
        $roles = $this->getTable($this->roleTable, 'Application\Model\RoleTable')->fetchAllAsArray();
        unset($roles['1']);unset($roles['2']);
        $employeeForm->get('role_id')->setValueOptions($roles);

        if ($employeeId) {
            $employee = $this->getTable($this->employeeTable, 'Application\Model\EmployeeTable')->find($employeeId);
            $employeeForm->get('member_id')->setValue($employee->member_id)->setAttribute('readonly', 'readonly');
            $employeeForm->get('firstname')->setValue($employee->firstname);
            $employeeForm->get('lastname')->setValue($employee->lastname);
            $employeeForm->get('emailid')->setValue($employee->emailid);
            $employeeForm->getInputFilter()->remove('emailid');
            $employeeForm->get('userid')->setValue($employee->userid);
            $employeeForm->get('password')->setValue($employee->password);
            $employeeForm->get('branch_id')->setValue($employee->branch_id);
            $employeeForm->get('mobile_number')->setValue($employee->mobile_number);
            $employeeForm->get('dob')->setValue($employee->dob);
            $employeeForm->get('gender')->setValue($employee->gender);
            $employeeForm->get('country_id')->setValue($employee->country_id);
            $employeeForm->get('state_id')->setValue($employee->state_id);
            $employeeForm->get('city_id')->setValue($employee->city_id);
            $employeeForm->get('address')->setValue($employee->address);
            $employeeForm->get('pan_number')->setValue($employee->pan_number);
            $employeeForm->get('gardian_name')->setValue($employee->gardian_name);
            $employeeForm->get('nominee_relation')->setValue($employee->nominee_relation);
            $employeeForm->get('nominee_address')->setValue($employee->nominee_address);
            $employeeForm->get('nominee_name')->setValue($employee->nominee_name);
            $employeeForm->get('employee_code')->setValue($employee->employee_code);
            $employeeForm->get('introducer_code')->setValue($employee->introducer_code);
            $employeeForm->get('role_id')->setValue($employee->role_id);
            $employeeForm->get('company_id')->setValue($employee->company_id);
        }

        if ($request->isPost()) {
            $data = $request->getPost();
            $employeeForm->setData($data);
            if ($employeeForm->isValid()) {
                if (empty($data['employee_code'])) {
                    $branch = $this->getTable($this->branchTable, 'Application\Model\BranchsTable')->find($data['branch_id']);
                    $maxIdData = $this->getTable($this->employeeTable, 'Application\Model\EmployeeTable')->findMaxId($data['branch_id']);
                    $maxId = $maxIdData->max_id;
                    $maxId = $maxId + 1;
                    $code = $branch->code . sprintf('%08d', $maxId);
                    $data['employee_code'] = $code;
                }
                if (empty($data['userid'])) {
                    $data['userid'] = $data['employee_code'];
                }
                if (empty($data['password'])) {
                    $data['password'] = md5($data['employee_code']);
                }
                if(empty($data['company_id'])) {
                    $data['company_id'] = $authData->company_id; 
                }
                $data['created_by'] = $authData->id;
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['updated_by'] = $authData->id;
                if ($employeeId) {
                    $data->id = $employeeId;
                    unset($data['member_id']);
                    unset($data['employee_code']);
                    unset($data['created_by']);
                    unset($data['created_at']);
                }
                $data = $data->toArray();
                try{
                    $employeeId = $this->getTable($this->employeeTable, 'Application\Model\EmployeeTable')->save($data);
                    if ($employeeId) {
                        $this->flashMessenger()->addMessage('Agent created successfully!', 'success');
                        $this->redirect()->toRoute('employees');
                    } else {
                        $this->flashMessenger()->addMessage('Oops! there are some error with this process. Please try after some time!', 'error');
                    }
                } catch(\Exception $e){
                    //print_r($e->getMessage()); exit;	
                    $this->flashMessenger()->addMessage('Oops! there are some error with this process. Please try after some time!', 'error');
                    //$this->flashMessenger()->addMessage($e->getMessage(), 'error');
                    $this->redirect()->toRoute('employees');
                }
            }
        }

        $basePath = $this->getServiceLocator()->get('Request')->getBasePath();
        $this->getServiceLocator()->get('viewhelpermanager')->get('headLink')->appendStylesheet($basePath . '/css/jquery-ui.css');
        $this->getServiceLocator()->get('viewhelpermanager')->get('headScript')->appendFile($basePath . '/js/jquery-ui.js');

        return new ViewModel(array(
                'employeeForm' => $employeeForm,
            )
        );
    }

    public function getTable($table, $name) {
        if (!$table) {
            $sm = $this->getServiceLocator();
            $table = $sm->get($name);
        }
        return $table;
    }

}

?>