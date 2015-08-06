<?php

namespace Members\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Members\Form\MemberForm;

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
		$errors = array();
		$stateid = '';
		$cityid = '';
		if($memberId) {
			$member = $this->getTable($this->memberTable,'Application\Model\MemberTable')->find($memberId);
			$memberForm->get('firstname')->setValue($member->firstname);
			$memberForm->get('lastname')->setValue($member->lastname);
			$memberForm->get('emailid')->setValue($member->emailid);		
			$memberForm->get('branch_id')->setValue($member->branch_id);		
			$memberForm->get('mobile_number')->setValue($member->mobile_number);
			$memberForm->get('dob')->setValue($member->dob);
			$memberForm->get('gender')->setValue($member->gender);
			$stateid = $member->state_id;
			$cityid = $member->city_id;
			$memberForm->get('country_id')->setValue($member->country_id);
			$memberForm->get('state_id')->setValue($stateid);
			$memberForm->get('address')->setValue($member->address);
			$memberForm->get('gardian_name')->setValue($member->gardian_name);
			$memberForm->get('nominee_relation')->setValue($member->nominee_relation);
			$memberForm->get('nominee_address')->setValue($member->nominee_address);
			$memberForm->get('nominee_name')->setValue($member->nominee_name);
			$memberForm->get('member_id')->setValue($member->member_id);
 		}
		$request = $this->getRequest();
		if($request->isPost()) {
			$data = $request->getPost();
			
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
		}
        return new ViewModel(array(
				'memberForm'	=> $memberForm,
				'stateid'		=> $stateid,
				'cityid'		=> $cityid,
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
