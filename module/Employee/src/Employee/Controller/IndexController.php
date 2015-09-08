<?php
namespace Employee\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Employee\Form\EmployeeForm;
use Employee\Form\Filter\EmployeeFilter;

use Application\Service\Upload;

class IndexController extends AbstractActionController {

	protected $countryTable;
	protected $companyTable;
	protected $roleTable;
	protected $employeeTable;
        protected $branchTable;
	
	public function __construct() {
		
	}
	
	function indexAction()
	{
            $auth = $this->getServiceLocator()->get('AuthService');
            $authData = $auth->getIdentity();
            if($authData->role_id == 1 || $authData->role_id == 2) {
                $employees = $this->getTable($this->employeeTable,'Application\Model\EmployeeTable')->fetchAll('1');
            } else {
                $employees = $this->getTable($this->employeeTable,'Application\Model\EmployeeTable')->fetchAll('1', $authData->branch->id);
            }
            return new ViewModel(array(
                'employees' => $employees
            ));
	}
	
	function addAction()
	{
		$employee = array();
		$employeeid = $this->params()->fromRoute('id',0);		
		$errors = array();
		$countryArr = array(); $companyArr = array();
		$stateid=''; $photo='';
                $auth = $this->getServiceLocator()->get('AuthService');
                $authData = $auth->getIdentity();
		$employeeForm = new EmployeeForm();		
		$countries = $this->getTable($this->countryTable,'Application\Model\CountryTable')->fetchAll();		
		foreach($countries as $country) {
                    $countryArr[$country->id] = $country->name;
		}
		$companies = $this->getTable($this->companyTable,'Company\Model\CompanyTable')->fetchAll();
		foreach($companies as $company) {
                    $companyArr[$company->id] = $company->name;
		}
		$rolesArr = $this->getTable($this->roleTable,'Application\Model\RoleTable')->fetchAllAsArray();
                if( $authData->role_id == 2) {
                    $rolesArr['2'] = 'Owner';
                }
                unset($rolesArr[1]);		
                
                if($authData->role_id == 1 || $authData->role_id == 2) {
                    $employees = $this->getTable($this->employeeTable,'Application\Model\EmployeeTable')->fetchAllAsArray($authData->branch->company_id);
                } else {
                    $employees = $this->getTable($this->employeeTable,'Application\Model\EmployeeTable')->fetchAllAsArray($authData->branch->company_id, $authData->branch->id);
                }
                $employeeForm->get('introducer_code')->setValueOptions($employees);
                
		$employeeForm->get('role_id')->setValueOptions($rolesArr);
		$employeeForm->get('company_id')->setValueOptions($companyArr);
		$employeeForm->get('country_id')->setValueOptions($countryArr);
		$employeeForm->get('per_country_id')->setValueOptions($countryArr);
		$state_id = '';
		$per_state_id = '';
		$branch_id = '';
		if($employeeid){
			$employee = $this->getTable($this->employeeTable,'Application\Model\EmployeeTable')->find($employeeid);
			$employeeForm->get('company_id')->setValue($employee->company_id);
			$employeeForm->get('role_id')->setValue($employee->role_id);
			$employeeForm->get('country_id')->setValue($employee->country_id);
			$employeeForm->get('per_country_id')->setValue($employee->per_country_id);
			$employeeForm->get('employee_code')->setValue($employee->employee_code);
			$employeeForm->get('employee_name')->setValue($employee->employee_name);
			$employeeForm->get('blood_group')->setValue($employee->blood_group);
			$employeeForm->get('mobile_no')->setValue($employee->mobile_no);
			$employeeForm->get('email')->setValue($employee->email);
			$employeeForm->get('father_name')->setValue($employee->father_name);
			$employeeForm->get('mother_name')->setValue($employee->mother_name);
			$employeeForm->get('nominee_name')->setValue($employee->nominee_name);
			$employeeForm->get('nominee_relation')->setValue($employee->nominee_relation);
			$employeeForm->get('nominee_address')->setValue($employee->nominee_address);
			$employeeForm->get('introducer_code')->setValue($employee->introducer_code);
			$employeeForm->get('address')->setValue($employee->address);
			$employeeForm->get('city')->setValue($employee->city);
			$employeeForm->get('per_city')->setValue($employee->per_city);
			$employeeForm->get('pincode')->setValue($employee->pincode);
			$employeeForm->get('per_address')->setValue($employee->per_address);
			$employeeForm->get('per_pincode')->setValue($employee->per_pincode);
			$employeeForm->get('per_mobile_no')->setValue($employee->per_mobile_no);
			$employeeForm->get('status')->setValue($employee->status);
			$state_id = $employee->state_id;
			$per_state_id = $employee->per_state_id;
			$branch_id = $employee->branch_id;
		}
		$request = $this->getRequest();
		if($request->isPost()) {
			$data = $request->getPost();
			$employeeForm->setInputFilter(new EmployeeFilter);
			$employeeForm->setData($data);
			if($employeeid){
				$employeeForm->getInputFilter()->remove('user_id');
				$employeeForm->getInputFilter()->remove('password');
				$employeeForm->getInputFilter()->remove('cpassword');
			}
			if($employeeForm->isValid()) {
				$files = $request->getFiles()->toArray();
				if(!empty($files['photo']['name'])) {
					$upload = new Upload();
					$destination = "C:/xampp/htdocs/zf2/public/uploads/employee";
					$fileinfo = $upload->uploadFile('photo',$destination);				
					$uniqueName = $fileinfo['uniqueName'];
					$data['photo'] = $uniqueName;
				}
				$auth = $this->getServiceLocator()->get('AuthService');
				$authData = $auth->getIdentity();
                                
                                if(empty($data['employee_code'])) {
                                    $branch = $this->getTable($this->branchTable,'Application\Model\BranchsTable')->find($data['branch_id']);
                                    $maxIdData = $this->getTable($this->employeeTable,'Application\Model\EmployeeTable')->findMaxId();
                                    $maxId = $maxIdData->max_id;
                                    $maxId = $maxId+1;
                                    $code = $branch->code.sprintf('%04d',$maxId);
                                    $data['employee_code'] = $code;
                                }
                                if(empty($data['user_id'])) {
                                    $data['user_id'] = $data['employee_code'];
                                }
                                if(empty($data['password'])) {
                                    $data['password'] = $data['password'];
                                }
                                
				$data['created_by'] =  $authData->id;
				$data['created_at'] = date('Y-m-d H:i:s');
				$data['updated_by'] = $authData->id;
				$employeeId = $this->getTable($this->employeeTable,'Application\Model\EmployeeTable')->save($data,$employeeid);
				if($employeeId) {
					$this->flashMessenger()->addMessage('Agent created successfully!','success');	
					$this->redirect()->toRoute('employee-list');
				} else {
					$this->flashMessenger()->addMessage('Oops! there are some error with this process. Please try after some time!','error');
				}
			} else {
				$errors = $employeeForm->getMessages();
			}
		}
                
		return new ViewModel(array(
                    'employeeForm' 	=> $employeeForm,
                    'employeeid'	=> $employeeid,
                    'state_id'		=> $state_id,
                    'per_state_id'	=> $per_state_id,
                    'branch_id'		=> $branch_id,
                    'errors'		=> $errors
		));
	}
	
	public function getTable($table, $name) {
        if(!$table) {
            $sm = $this->getServiceLocator();
            $table = $sm->get($name);
        }
        return $table;
    }
}
?>