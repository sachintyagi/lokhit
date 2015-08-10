<?php
namespace Company\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Company\Form\CompanyForm;
use Company\Form\Filter\CompanyFilter;

use Company\Model\CompanyTable;

use Application\Service\Upload;

class IndexController extends AbstractActionController {

	protected $countryTable;
	protected $companyTable;
	
	public function __construct() {
		
	}
	
	function indexAction()
	{
		$companies = $this->getTable($this->companyTable,'Company\Model\CompanyTable')->fetchAll();
		return new ViewModel(array(
			'companies' => $companies
		));
	}
	
	function addAction()
	{
		$errors = array();
		$countryArr = array();
		$stateid=''; $logo='';
		$companyid = $this->params()->fromRoute('companyid',null);		
		$companyForm = new CompanyForm();		
		$countries = $this->getTable($this->countryTable,'Application\Model\CountryTable')->fetchAll();
		foreach($countries as $country) {
			$countryArr[$country->id] = $country->name;
		}
		$companyForm->get('country_id')->setValueOptions($countryArr);		
		if($companyid) {
			$company = $this->getTable($this->companyTable,'Company\Model\CompanyTable')->find($companyid);
			$companyForm->get('country_id')->setValue($company->country_id);
			$companyForm->get('name')->setValue($company->name);
			$companyForm->get('phone_no')->setValue($company->phone_no);
			$companyForm->get('mobile_no')->setValue($company->mobile_no);
			$companyForm->get('address')->setValue($company->address);
			$companyForm->get('city')->setValue($company->city);
			$companyForm->get('pincode')->setValue($company->pincode);
			$companyForm->get('status')->setValue($company->status);
			$stateid = $company->state_id;
			$logo = $company->logo;
		}
		$request = $this->getRequest();
		if($request->isPost()) {
			$data = $request->getPost();
			$companyForm->setInputFilter(new CompanyFilter);
			$companyForm->setData($data);
			if($companyForm->isValid()) {
				$files = $request->getFiles()->toArray();
				if(!empty($files['logo']['name'])) {
					$upload = new Upload();
					$destination = "C:/xampp/htdocs/lokhit/public/uploads/company";
					$fileinfo = $upload->uploadFile('logo',$destination);				
					$uniqueName = $fileinfo['uniqueName'];
					$data['logo'] = $uniqueName;
				}
				$companyId = $this->getTable($this->companyTable,'Company\Model\CompanyTable')->save($data,$companyid);
				if($companyId) {
					$this->flashMessenger()->addMessage(array('success' => 'Company Created successfully!'));	
					$this->redirect()->toRoute('company-list');
				} else {
					$this->flashMessenger()->addMessage(array('error' => 'Company Not Created!'));
				}
			} else {
				$errors = $companyForm->getMessages();
			}
		}
		
		return new ViewModel(array(
			'companyForm' 	=> $companyForm,
			'stateid'	  	=> $stateid,
			'logo'	  		=> $logo,
			'errors'	  	=> $errors
		));
	}
	
	public function deleteAction() {
		$companyid = $this->params()->fromRoute('companyid',null);
		if($companyid) {
			$deleted = $this->getTable($this->companyTable,'Company\Model\CompanyTable')->delete($companyid);
			if($deleted) {
				$this->flashMessenger()->addMessage(array('success' => 'Company Deleted Successfully!'));
			} else {
				$this->flashMessenger()->addMessage(array('error' => 'Company Not Deleted!'));	
			}
		}
		$this->redirect()->toRoute('company-list');
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