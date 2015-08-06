<?php
namespace Company\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Company\Form\BranchForm;

class BranchController extends AbstractActionController {

	public function __construct() {
		
	}
	
	function indexAction()
	{
		return new ViewModel();
	}
	
	function addAction()
	{
		$branchForm = new BranchForm();
		
		return new ViewModel(array(
			'branchForm' => $branchForm
		));
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