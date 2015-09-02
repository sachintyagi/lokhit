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
		$branches = $this->getTable($this->branchTable,'Application\Model\BranchsTable')->fetchAll();
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
                
                $auth = $this->getServiceLocator()->get('AuthService');
		$authData = $auth->getIdentity();
                
		$countries = $this->getTable($this->countryTable,'Application\Model\CountryTable')->fetchAll();
		foreach($countries as $country) {
			$countryArr[$country->id] = $country->name;
		}
		$branchForm->get('country_id')->setValueOptions($countryArr);
		
		$companies = $this->getTable($this->companyTable,'Application\Model\CompanyTable')->fetchAll('1');
		foreach($companies as $row) {
			$companiesArr[$row->id] = $row->name;
		}
		$branchForm->get('company_id')->setValueOptions($companiesArr);
		if($branchid) {
			$branch = $this->getTable($this->branchTable,'Application\Model\BranchsTable')->find($branchid);
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
			$branchid = $branch->parent_id;
		}
		$request = $this->getRequest();
		if($request->isPost()) {
			$data = $request->getPost();
			$branchForm->setInputFilter(new BranchFilter);
			$branchForm->setData($data);
			if($branchForm->isValid()) {
				$companyid = $data['company_id'];
                                if(empty($data['code'])) {
                                    $maxIdData = $this->getTable($this->branchTable,'Application\Model\BranchsTable')->findMaxId();
                                    $maxId = $maxIdData->max_id;
                                    $maxId = $maxId+1;
                                    $code = $companyid.sprintf('%03d',$maxId);
                                    $data['code'] = $code;
                                } 
                                if($branchid = $this->params()->fromRoute('branchid',null)) {
                                   $data['id'] = $branchid; 
                                }
                                $data['updated_by'] = $authData->id;
                                $branchId = $this->getTable($this->branchTable,'Application\Model\BranchsTable')->save($data,$branchid);
				if($branchId) {
					$this->flashMessenger()->addMessage('Branch Created successfully!', 'success');	
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
			'branchid'	  	=> $branchid,
			'errors'	  	=> $errors
		));
	}
	
	function branchCode($companyid) {
		$maxId = 0;
		$branchRow = $this->getTable($this->branchTable,'Application\Model\BranchsTable')->getBranchCode($companyid);
		if(isset($branchRow->code) && !empty($branchRow->code)) {
                    $code = $branchRow->code;
		} else {
                    
		}                
		return $code;
	}
	
	public function deleteAction() {
		$branchid = $this->params()->fromRoute('branchid',null);
		if($branchid) {
			$deleted = $this->getTable($this->branchTable,'Application\Model\BranchsTable')->delete($branchid);
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