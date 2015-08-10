<?php
namespace Company\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Company\Form\BranchForm;
use Company\Form\Filter\BranchFilter;

use Company\Model\BranchTable;

class BranchController extends AbstractActionController {

	protected $countryTable;
	protected $branchTable;
	protected $companyTable;
	
	public function __construct() {
		
	}
	
	function indexAction()
	{
		$branches = $this->getTable($this->branchTable,'Company\Model\BranchTable')->fetchAll();
		return new ViewModel(array(
			'branches' => $branches
		));
	}
	
	function addAction()
	{
		$errors = array();
		$countryArr = array();
		$branchesArr = array();
		$companiesArr = array();
		$stateid='';
		$branchid = $this->params()->fromRoute('branchid',null);		
		$branchForm = new BranchForm();		
		$countries = $this->getTable($this->countryTable,'Application\Model\CountryTable')->fetchAll();
		foreach($countries as $country) {
			$countryArr[$country->id] = $country->name;
		}
		$branchForm->get('country_id')->setValueOptions($countryArr);
		$branches = $this->getTable($this->branchTable,'Company\Model\BranchTable')->fetchAll('1');
		foreach($branches as $row) {
			$branchesArr[$row->id] = $row->name;
		}
		$branchForm->get('parent_id')->setValueOptions($branchesArr);
		$companies = $this->getTable($this->companyTable,'Company\Model\CompanyTable')->fetchAll('1');
		foreach($companies as $row) {
			$companiesArr[$row->id] = $row->name;
		}
		$branchForm->get('company_id')->setValueOptions($companiesArr);
		if($branchid) {
			$branch = $this->getTable($this->branchTable,'Company\Model\BranchTable')->find($branchid);
			$branchForm->get('parent_id')->setValue($branch->parent_id);
			$branchForm->get('company_id')->setValue($branch->company_id);
			$branchForm->get('name')->setValue($branch->name);
			$branchForm->get('code')->setValue($branch->code);
			$branchForm->get('phone_no')->setValue($branch->phone_no);
			$branchForm->get('mobile_no')->setValue($branch->mobile_no);
			$branchForm->get('address')->setValue($branch->address);
			$branchForm->get('country_id')->setValue($branch->country_id);
			$branchForm->get('city')->setValue($branch->city);
			$branchForm->get('pincode')->setValue($branch->pincode);
			$branchForm->get('status')->setValue($branch->status);
			$stateid = $branch->state_id;
		}
		$request = $this->getRequest();
		if($request->isPost()) {
			$data = $request->getPost();
			$branchForm->setInputFilter(new BranchFilter);
			$branchForm->setData($data);
			if($branchForm->isValid()) {
				$branchId = $this->getTable($this->branchTable,'Company\Model\BranchTable')->save($data,$branchid);
				if($branchId) {
					$this->flashMessenger()->addMessage(array('success' => 'Branch Created successfully!'));	
					$this->redirect()->toRoute('branch-list');
				} else {
					$this->flashMessenger()->addMessage(array('error' => 'Branch Not Created!'));
				}
			} else {
				$errors = $branchForm->getMessages();
			}
		}
		return new ViewModel(array(
			'branchForm' 	=> $branchForm,
			'stateid'	  	=> $stateid,
			'errors'	  	=> $errors
		));
	}
	
	public function deleteAction() {
		$branchid = $this->params()->fromRoute('branchid',null);
		if($branchid) {
			$deleted = $this->getTable($this->branchTable,'Company\Model\BranchTable')->delete($branchid);
			if($deleted) {
				$this->flashMessenger()->addMessage(array('success' => 'Branch Deleted Successfully!'));
			} else {
				$this->flashMessenger()->addMessage(array('error' => 'Branch Not Deleted!'));	
			}
		}
		$this->redirect()->toRoute('branch-list');
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