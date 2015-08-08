<?php
namespace Report\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PrintController extends AbstractActionController {

	protected $memberInvestmentsTable;
	
	public function __construct() {
		
	}
	
	function certificateAction()
	{		
		$this->layout('layout/empty');
		$investmentId = $this->params()->fromRoute('id',0);
		$investments = $this->getTable($this->memberInvestmentsTable,'Application\Model\MemberInvestmentsTable')->findInvestors('1', $investmentId);		
		return new ViewModel(array(
			'certificate' => $investments,
			'id' => $investmentId
		));
	}
	
	function printCertificateAction()
	{		
		$this->layout('layout/empty');
		$investmentId = $this->params()->fromRoute('id',0);
		$investments = $this->getTable($this->memberInvestmentsTable,'Application\Model\MemberInvestmentsTable')->findInvestors('1', $investmentId);		
		return new ViewModel(array(
			'certificate' => $investments
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