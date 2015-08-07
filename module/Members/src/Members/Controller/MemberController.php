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
	protected $cities;
	
    public function listAction()
    {
		$members = $this->getTable($this->memberTable,'Application\Model\MemberTable')->fetchAll('1');
		return new ViewModel(array(
			'members' => $members
		));
    }
	
	public function newAction()
    {
		$memberId = $this->params()->fromRoute('id',0);
		$memberForm = new MemberForm($this->getServiceLocator());
	
		$request = $this->getRequest();
		if($request->isPost()) {
			$data = $request->getPost();
			$memberForm->setInputFilter(new MemberFilter($this->getServiceLocator()));
			$memberForm->setData($data);
			
			$cities = $this->getTable($this->cities,'Application\Model\CityTable')->fetchAllAsArray($memberForm->get('state_id')->getValue());
			$memberForm->get('city_id')->setValueOptions($cities);
			
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
			}
		}
		
        return new ViewModel(array(
				'memberForm'	=> $memberForm,
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
