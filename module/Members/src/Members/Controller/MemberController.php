<?php

namespace Members\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Members\Form\MemberForm;
use Members\Form\Filter\MemberFilter;

class MemberController extends AbstractActionController
{
	protected $memberTable;
	protected $branchsTable;
	protected $states;
	
    public function listAction()
    {
		if (!$this->getServiceLocator()
                        ->get('AuthService')->hasIdentity()) {
            return $this->redirect()->toRoute('login');
        }
		$members = $this->getTable($this->memberTable,'Application\Model\MemberTable')->fetchAll('1');
		return new ViewModel(array(
			'members' => $members
		));
    }
	
	public function newAction()
    {
		if (!$this->getServiceLocator()
                        ->get('AuthService')->hasIdentity()) {
            return $this->redirect()->toRoute('login');
        }
		$memberId = $this->params()->fromRoute('id',0);
		$memberForm = new MemberForm();
		$states = $this->getTable($this->states,'Application\Model\StateTable')->fetchAllAsArray();
		$memberForm->get('state_id')->setValueOptions($states);
		$request = $this->getRequest();
		if($request->isPost()) {
			$data = $request->getPost();
			$memberForm->setInputFilter(new MemberFilter($this->getServiceLocator()));
			$memberForm->setData($data);
			if($memberForm->isValid()) {
				if($memberId) {
					$data->id = $memberId;
				}
				if(empty($data->member_id)) {
					$branch = $this->getTable($this->branchsTable,'Application\Model\BranchsTable')->find($data->branch_id);
					if($branch) {
						$code = $branch->code;
					} else {
						throw new \Exception('Please provide brach code');
					}
					$maxIdData = $this->getTable($this->memberTable,'Application\Model\MemberTable')->findMaxId();
					if($maxIdData) {
						$maxId = $maxIdData->max_id;
					}
					$maxId = $maxId+1;
					$data->member_id = $code.'-'.sprintf('%08d',$maxId);
				}
				$data = $data->toArray();
				$data['status'] = 1;
				$saveddata = $this->getTable($this->memberTable,'Application\Model\MemberTable')->save($data);
				if($saveddata) {
					$this->redirect()->toRoute('members');
				}
			} else {
				$errors = $memberForm->getMessages();
			}
		}
        return new ViewModel(array(
				'memberForm'	=> $memberForm,
				'errors'		=> $errors
			)
		);
    }
	
	public function deleteAction()
    {
		$memberId = $this->params()->fromRoute('id',0);
		$member = $this->getTable($this->memberTable,'Application\Model\MemberTable')->delete($memberId);
        $this->redirect()->toRoute('members');
    }
	
	public function getTable($table, $name) {
        if (!$table) {
            $sm = $this->getServiceLocator();
            $table = $sm->get($name);
        }
        return $table;
    }
}
