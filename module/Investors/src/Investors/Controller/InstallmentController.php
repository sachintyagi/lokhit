<?php

namespace Investors\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Investors\Form\InstallmentForm;
use Investors\Form\Filter\InstallmentFilter;

class InstallmentController extends AbstractActionController {

    protected $memberInvestmentsTable;
    protected $memberInstallmentsTable;

    public function listAction() {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $draw = $this->getRequest()->getQuery('draw', 1);
            $length = $this->getRequest()->getQuery('length', 10);
            $offset = $this->getRequest()->getQuery('start', 0);
            $search = $this->getRequest()->getQuery('search', null);
            $order = $this->getRequest()->getQuery('order', null);
            $conditions = array(
                'fields' => array(
                    'id',
                    'ammount',
                    'receipt_number',
                    'installment_number',
                    'created_at',                    
                ),
                'filters' => array(),
                'joins' => array(
					array(
                        'table' => 'member_investments',
                        'mapping' => 'member_installments.investment_id = member_investments.id',
                        'fields' => array('branch_id', 'cf_number',)
                    ),
                    array(
                        'table' => 'members',
                        'mapping' => 'member_investments.member_id = members.member_id',
                        'fields' => array('firstname', 'lastname', 'member_id', 'emailid', 'gardian_name', 'address', 'nominee_name', 'nominee_relation', 'dob')
                    )
                ),
                'limit' => (int) $length,
                'offset' => (int) $offset,
                'search' => array()
            );
            if (!empty($search['value'])) {
                $conditions['search'] = array(
                    'term' => $search['value'],
                    'fields' => array('cf_number', 'receipt_number', 'firstname', 'lastname', 'ammount')
                );
            }
            $auth = $this->getServiceLocator()->get('AuthService');
            $authData = $auth->getIdentity();
            $roleId = $authData->role_id;
            $conditions['filters'][] = array('member_investments.branch_id' => $authData->branch->id);
            $conditions['filters'][] = array('member_investments.is_deleted' => 0);

            $installments = $this->getTable($this->memberInstallmentsTable, 'Application\Model\MemberInstallmentsTable')->fetchAll($conditions);
            $installmentsTotal = $this->getTable($this->memberInstallmentsTable, 'Application\Model\MemberInstallmentsTable')->fetchTotal($conditions);
            $data = array();
			$i = $offset+1;
            foreach ($installments as $installment) {
                $data[] = array(
                    $i++,
                    $installment->receipt_number,
                    $installment->cf_number,
                    $installment->firstname . ' ' . $installment->lastname,
                    $installment->member_id,
                    $installment->installment_number,
                    $installment->ammount,
					0,
					$installment->ammount,
					date('d M, y', strtotime($installment->created_at)),
                    '<a title="Print Receipt" href="' . $this->getServiceLocator()->get('Request')->getBasePath() . '/reports/receipt/' . $installment->id . '"><i class="glyphicon glyphicon-file"></i></a>',
                );
            }
            return new JsonModel(
                    array(
                "draw" => (int) $draw,
                "recordsTotal" => (int) $installmentsTotal->count(),
                "recordsFiltered" => (int) $installmentsTotal->count(),
                "data" => $data,
                    )
            );
        }
        return new ViewModel(array());
    }

    public function newAction() {
        $auth = $this->getServiceLocator()->get('AuthService');
        $authData = $auth->getIdentity();
        $investorId = $this->params()->fromRoute('id', 0);
        $installmentForm = new InstallmentForm();
        $installmentForm->setInputFilter(new InstallmentFilter());
        $request = $this->getRequest();
        if ($request->isPost()) {
            $posts = $request->getPost();
            $installmentForm->setData($posts);
            if ($installmentForm->isValid()) {
                $installmentTable = $this->getTable($this->memberInvestmentsTable, 'Application\Model\MemberInstallmentsTable');
                $investmentTable = $this->getTable($this->memberInvestmentsTable, 'Application\Model\MemberInvestmentsTable');
                try {
                    $this->getAdapter()->getDriver()->getConnection()->beginTransaction();
                    $investmentRow = $investmentTable->find($posts->investment_id);
                    $investmentRow->installment_no = $investmentRow->installment_no + 1;

                    $maxIdData = $installmentTable->findMaxId($authData->branch->id);
                    $maxId = $maxIdData->max_id;
                    $maxId = $maxId + 1;

                    $installment = array(
                        'investment_id' => $posts->investment_id,
                        'ammount' => $posts->amount,
						'due_date' => date('Y-m-d H:i:s', strtotime($posts->due_date)),
                        'receipt_number' => $authData->branch->code . $investmentId . date('dmY') . $maxId,
                        'installment_number' => $investmentRow->installment_no,
                        'status' => 1,
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    $receiptId = $installmentTable->save($installment);

                    $investmentTable->save(array(
                        'id' => $investmentRow->id,
                        'installment_no' => $investmentRow->installment_no,
						'next_due_date' => date('Y-m-d H:i:s', strtotime($posts->next_due_date)),
                    ));

                    $this->getAdapter()->getDriver()->getConnection()->commit();
					return $this->redirect()->toRoute('receipt',array('id' => $receiptId));
                } catch (\Exception $e) {
                    $this->getAdapter()->getDriver()->getConnection()->rollback();
                    //throw new \Exception($e->getMessage());
                    $this->flashMessenger()->addMessage('Oops! there are some error (' . $e->getMessage() . ') with this process. Please try after some time', 'error');
                    return $this->redirect()->toRoute('installments');
                }
                
				
            }
        }
		
		$basePath = $this->getServiceLocator()->get('Request')->getBasePath();
        $this->getServiceLocator()->get('viewhelpermanager')->get('headLink')->appendStylesheet($basePath . '/css/jquery-ui.css');
        $this->getServiceLocator()->get('viewhelpermanager')->get('headScript')->appendFile($basePath . '/js/jquery-ui.js');
		
        return new ViewModel(array(
            'installmentForm' => $installmentForm,
                )
        );
    }

    public function getAdapter() {
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
