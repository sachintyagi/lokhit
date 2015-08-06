<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Form\MemberForm;

class MemberController extends AbstractActionController
{
	protected $memberTable;
	protected $states;
	
    public function indexAction()
    {
		$members = $this->getTable($this->memberTable,'Application\Model\MemberTable')->fetchAll('1');
		return new ViewModel(array(
			'members' => $members
		));
    }
	
	public function addAction()
    {
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
			$memberForm->get('mobile_number')->setValue($member->mobile_number);
			$memberForm->get('dob')->setValue($member->dob);
			$stateid = $member->state_id;
			$cityid = $member->city_id;
			$memberForm->get('state_id')->setValue($stateid);
			$memberForm->get('address')->setValue($member->address);
			$memberForm->get('gardian_name')->setValue($member->gardian_name);
			$memberForm->get('nominee_relation')->setValue($member->nominee_relation);
			$memberForm->get('nominee_address')->setValue($member->nominee_address);
			$memberForm->get('nominee_name')->setValue($member->nominee_name);
 		}
		$request = $this->getRequest();
		if($request->isPost()) {
			$data = $request->getPost();
			if($memberId) {
				$data->id = $memberId;
			}			
			$data = $data->toArray();
			unset($data['save-member']);	
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
