<?php
namespace Company\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Company\Form\CompanyForm;

class IndexController extends AbstractActionController {

	public function __construct() {
		
	}
	
	function indexAction()
	{
		return new ViewModel();
	}
	
	function addAction()
	{
		$companyForm = new CompanyForm();
		return new ViewModel(array(
			'companyForm' => $companyForm
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