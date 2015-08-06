<?php

namespace Investors\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Investors\Form\InstallmentForm;

class InstallmentController extends AbstractActionController
{
	protected $memberTable;
	protected $plansTable;
	protected $plansDetailsTable;	
	protected $memberInvestmentsTable;
	protected $memberInstallmentsTable;
		
    public function listAction()
    {
		if (!$this->getServiceLocator()
                        ->get('AuthService')->hasIdentity()) {
            return $this->redirect()->toRoute('login');
        }
		$investments = $this->getTable($this->memberInvestmentsTable,'Application\Model\MemberInvestmentsTable')->findInvestors('1');
		return new ViewModel(array(
			'investments' => $investments
		));
    }
	
	public function newAction()
    {
		if (!$this->getServiceLocator()
                        ->get('AuthService')->hasIdentity()) {
            return $this->redirect()->toRoute('login');
        }
		$investorId = $this->params()->fromRoute('id',0);
		$installmentForm = new InstallmentForm();
		$request = $this->getRequest();
		if($request->isPost()) {
			$posts = $request->getPost(); 
			$installmentTable = $this->getTable($this->memberInvestmentsTable,'Application\Model\MemberInstallmentsTable');
			$investmentTable = $this->getTable($this->memberInvestmentsTable,'Application\Model\MemberInvestmentsTable');
			try{
				$this->getAdapter()->getDriver()->getConnection()->beginTransaction();
				$installment = array(
					'investment_id' => $posts->investment_id,
					'ammount' => $posts->amount,
					'status' => 1,
					'created_at'=> date('Y-m-d H:i:s')
				);
				$installmentTable->save($installment);	
				$investmentRow = $investmentTable->find($posts->investment_id);
				$investmentRow->installment_no = $investmentRow->installment_no+1;
				$investmentTable->save(array(
					'id' => $investmentRow->id,
					'installment_no' => $investmentRow->installment_no,
				));
				
				$this->getAdapter()->getDriver()->getConnection()->commit();
			} catch(\Exception $e) {
				$this->getAdapter()->getDriver()->getConnection()->rollback();
				throw new \Exception($e);
			}					
			return $this->redirect()->toRoute('investors');
		}	
        return new ViewModel(array(
				'installmentForm'	=> $installmentForm,
			)
		);
    }
	
	public function getAdapter(){
		return $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
	}
	
	public function getTable($table, $name) {
        if (!$table) {
            $sm = $this->getServiceLocator();
            $table = $sm->get($name);
        }
        return $table;
    }
}
