<?php

namespace Members\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Members\Form\MemberForm;
use Members\Form\Filter\MemberFilter;

class MemberController extends AbstractActionController {

    protected $memberTable;
    protected $branchsTable;
    protected $states;
    protected $cities;

    public function listAction() {
        if($this->getRequest()->isXmlHttpRequest()) {
            $draw = $this->getRequest()->getQuery('draw', 1);
            $length = $this->getRequest()->getQuery('length', 10);            
            $offset = $this->getRequest()->getQuery('start', 0);
            $search = $this->getRequest()->getQuery('search', null);
            $order = $this->getRequest()->getQuery('order', null);            
            $conditions = array(
                'fields'=> array('*'),
                'filters'=> array(),
                'joins' => array(),
                'limit' => (int)$length,
                'offset' => (int)$offset,
                'search' => array()                
            );
            if(!empty($search['value'])) {
                $conditions['search'] =  array(
                    'term' => $search['value'],
                    'fields' => array('member_id', 'gardian_name','firstname','lastname','mobile_number','emailid')
                );
            }
            $auth = $this->getServiceLocator()->get('AuthService');
            $authData = $auth->getIdentity();
            $conditions['filters'][] = array('branch_id' => $authData->branch->id);
           
            $members = $this->getTable($this->memberTable, 'Application\Model\MemberTable')->fetchAll($conditions);    
            $membersTotal = $this->getTable($this->memberTable, 'Application\Model\MemberTable')->fetchTotal($conditions);    
            $data = array();
            foreach($members as $member) {
                $data[] = array(
                    $member->id,
                    $member->member_id,                    
                    $member->firstname.' '.$member->lastname,
                    $member->gardian_name,
                    $member->mobile_number,
                    $member->emailid,
                    '<a title="Edit" href="'.$this->getServiceLocator()->get('Request')->getBasePath().'/members/new/'.$member->id.'" ><i class="glyphicon glyphicon-edit"></i></a> | <a title="Delete" onclick="deleteMember('.$member->id.')" href="javascript:void(0);"><i class="glyphicon glyphicon-remove-sign"></i></a>',
                );
            }
            return new JsonModel(
                array(
                    "draw"=> (int)$draw,
                    "recordsTotal"=> (int)$membersTotal->count(),
                    "recordsFiltered"=> (int)$membersTotal->count(),
                    "data"=> $data,                
                )
            );
        } 
        return new ViewModel(array()); 
    }

    public function newAction() {
        $memberId = $this->params()->fromRoute('id', 0);
        $memberForm = new MemberForm($this->getServiceLocator());
        $memberForm->setInputFilter(new MemberFilter($this->getServiceLocator()));
        $request = $this->getRequest();

        $auth = $this->getServiceLocator()->get('AuthService');
        $authData = $auth->getIdentity();
        $branches = $this->getTable($this->branchsTable, 'Application\Model\BranchsTable')->fetchAllAsArray($authData->branch->company_id);

        $memberForm->get('branch_id')->setValueOptions($branches);

        if ($memberId) {
            $member = $this->getTable($this->memberTable, 'Application\Model\MemberTable')->find($memberId);
            $memberForm->get('firstname')->setValue($member->firstname);
            $memberForm->get('lastname')->setValue($member->lastname);
            $memberForm->get('emailid')->setValue($member->emailid);
            $memberForm->getInputFilter()->remove('emailid');
            $memberForm->get('branch_id')->setValue($member->branch_id);
            $memberForm->get('mobile_number')->setValue($member->mobile_number);
            $memberForm->get('dob')->setValue($member->dob);
            $memberForm->get('gender')->setValue($member->gender);
            $memberForm->get('country_id')->setValue($member->country_id);
            $memberForm->get('state_id')->setValue($member->state_id);
            $memberForm->get('city_id')->setValue($member->city_id);
            $memberForm->get('address')->setValue($member->address);
            $memberForm->get('gardian_name')->setValue($member->gardian_name);
            $memberForm->get('nominee_relation')->setValue($member->nominee_relation);
            $memberForm->get('nominee_address')->setValue($member->nominee_address);
            $memberForm->get('nominee_name')->setValue($member->nominee_name);
            $memberForm->get('member_id')->setValue($member->member_id);
        }

        if ($request->isPost()) {
            $data = $request->getPost();
            $memberForm->setData($data);
            $cities = $this->getTable($this->cities, 'Application\Model\CityTable')->fetchAllAsArray($memberForm->get('state_id')->getValue());
            $memberForm->get('city_id')->setValueOptions($cities);
            if ($memberForm->isValid()) {
                if ($memberId) {
                    $data->id = $memberId;
                }
                if (empty($data->member_id)) {
                    $branch = $this->getTable($this->branchsTable, 'Application\Model\BranchsTable')->find($data->branch_id);
                    if ($branch) {
                        $code = $branch->code;
                    } else {
                        throw new \Exception('Please provide brach code');
                    }
                    $maxIdData = $this->getTable($this->memberTable, 'Application\Model\MemberTable')->findMaxId();
                    if ($maxIdData) {
                        $maxId = $maxIdData->max_id;
                    }
                    $maxId = $maxId + 1;
                    $data->member_id = $code . sprintf('%08d', $maxId);
                }
                $data = $data->toArray();
                $data['status'] = 1;
                $data['dob'] = date('Y-m-d', strtotime($data['dob']));
                $data['created_by'] = $authData->id;
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['updated_by'] = $authData->id;
                $saveddata = $this->getTable($this->memberTable, 'Application\Model\MemberTable')->save($data);
                if ($saveddata) {
                    if ($memberId) {
                        $this->flashMessenger()->addMessage('Member information updated successfully', 'success');
                    } else {
                        $this->flashMessenger()->addMessage('New member added successfully', 'success');
                    }
                    $this->redirect()->toRoute('members');
                }
            }
        }

        $basePath = $this->getServiceLocator()->get('Request')->getBasePath();
        $this->getServiceLocator()->get('viewhelpermanager')->get('headLink')->appendStylesheet($basePath . '/css/jquery-ui.css');
        $this->getServiceLocator()->get('viewhelpermanager')->get('headScript')->appendFile($basePath . '/js/jquery-ui.js');

        return new ViewModel(array(
            'memberForm' => $memberForm,
                )
        );
    }

    public function deleteAction() {
        $memberId = $this->params()->fromRoute('id', 0);
        $member = $this->getTable($this->memberTable, 'Application\Model\MemberTable')->delete($memberId);
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
