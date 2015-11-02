<?php

namespace Report\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PrintController extends AbstractActionController {

    protected $memberInvestmentsTable;
    protected $memberInstallmentsTable;

    public function __construct() {
        
    }

    function certificateAction() {
        //$this->layout('layout/empty');
        $investmentId = $this->params()->fromRoute('id', 0);
        $investments = $this->getTable($this->memberInvestmentsTable, 'Application\Model\MemberInvestmentsTable')->findInvestors($investmentId);
        if (!$investments) {
            $this->flashMessenger()->addMessage('Oops! there are some error with this process. Please try after some time', 'error');
            return $this->redirect()->toRoute('investors');
        }
        return new ViewModel(array(
            'certificate' => $investments,
            'id' => $investmentId
        ));
    }

    function printCertificateAction() {
        $this->layout('layout/empty');
        $investmentId = $this->params()->fromRoute('id', 0);
        $investments = $this->getTable($this->memberInvestmentsTable, 'Application\Model\MemberInvestmentsTable')->findInvestors($investmentId);
        if (!$investments) {
            $this->flashMessenger()->addMessage('Oops! there are some error with this process. Please try after some time', 'error');
            return $this->redirect()->toRoute('investors');
        }
        return new ViewModel(array(
            'certificate' => $investments
        ));
    }

    function receiptAction() {
        //$this->layout('layout/empty');
        $receiptId = $this->params()->fromRoute('id', 0);
        $installment = $this->getTable($this->memberInstallmentsTable, 'Application\Model\MemberInstallmentsTable')->findReceipt($receiptId);
        if (!$installment) {
            $this->flashMessenger()->addMessage('Oops! there are some error with this process. Please try after some time', 'error');
            return $this->redirect()->toRoute('investors');
        }
        return new ViewModel(array(
            'receipt' => $installment,
            'id' => $receiptId
        ));
    }

    function printReceiptAction() {
        $this->layout('layout/empty');
        $receiptId = $this->params()->fromRoute('id', 0);
        $installment = $this->getTable($this->memberInstallmentsTable, 'Application\Model\MemberInstallmentsTable')->findReceipt($receiptId);
        if (!$installment) {
            $this->flashMessenger()->addMessage('Oops! there are some error with this process. Please try after some time', 'error');
            return $this->redirect()->toRoute('investors');
        }
        return new ViewModel(array(
            'receipt' => $installment,
            'id' => $receiptId
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