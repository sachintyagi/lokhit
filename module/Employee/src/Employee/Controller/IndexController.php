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
	protected $employeeTable;
	
	public function __construct() {
		
	}
	
	function indexAction()
	{
		return new ViewModel();
	}
	
	function addAction()
	{
		$errors = array();
		$countryArr = array(); $companyArr = array();
		$stateid=''; $photo='';
		$employeeid='';
		$employeeForm = new EmployeeForm();		
		$countries = $this->getTable($this->countryTable,'Application\Model\CountryTable')->fetchAll();
		foreach($countries as $country) {
			$countryArr[$country->id] = $country->name;
		}
		$companies = $this->getTable($this->companyTable,'Company\Model\CompanyTable')->fetchAll();
		foreach($companies as $company) {
			$companyArr[$company->id] = $company->name;
		}
		$employeeForm->get('company_id')->setValueOptions($companyArr);		
		$employeeForm->get('country_id')->setValueOptions($countryArr);
		$employeeForm->get('per_country_id')->setValueOptions($countryArr);
		
		$request = $this->getRequest();
		if($request->isPost()) {
			$data = $request->getPost();
			$employeeForm->setInputFilter(new EmployeeFilter);
			$employeeForm->setData($data);
			if($employeeForm->isValid()) {
				$files = $request->getFiles()->toArray();
				if(!empty($files['photo']['name'])) {
					$upload = new Upload();
					$destination = "C:/xampp/htdocs/lokhit/public/uploads/employee";
					$fileinfo = $upload->uploadFile('photo',$destination);				
					$uniqueName = $fileinfo['uniqueName'];
					$data['photo'] = $uniqueName;
				}
				$employeeId = $this->getTable($this->employeeTable,'Employee\Model\EmployeeTable')->save($data,$employeeid);
				if($employeeId) {
					$this->flashMessenger()->addMessage(array('success' => 'Employee Created successfully!'));	
					$this->redirect()->toRoute('employee-list');
				} else {
					$this->flashMessenger()->addMessage(array('error' => 'Employee Not Created!'));
				}
			} else {
				$errors = $employeeForm->getMessages();
			}
		}
		//echo '<pre>'; print_r($errors); die;
		return new ViewModel(array(
			'employeeForm' 	=> $employeeForm,
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