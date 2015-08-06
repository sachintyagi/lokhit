<?php
namespace Employee\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Employee\Form\EmployeeForm;

class IndexController extends AbstractActionController {

	public function __construct() {
		
	}
	
	function indexAction()
	{
		return new ViewModel();
	}
	
	function addAction()
	{
		$employeeForm = new EmployeeForm();
		return new ViewModel(array(
			'employeeForm' => $employeeForm
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