<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Form\UsersPolicyForm;

class PolicyController extends AbstractActionController
{
	protected $customerTable;
	protected $states;
	
    public function indexAction()
    {
		$customers = $this->getTable($this->customerTable,'Application\Model\CustomerTable')->fetchAll('1');
		return new ViewModel(array(
			'customers' => $customers
		));
    }
	
	public function createAction()
    {
		$customerId = $this->params()->fromRoute('id',0);
		$policyForm = new UsersPolicyForm();
		$customers = $this->getTable($this->customerTable,'Application\Model\CustomerTable')->fetchAllAsArray();
		$policyForm->get('customer_id')->setAttribute('options' ,array_merge(array(''=>'-Select-'),$customers));
		
		$palns = $this->getTable($this->customerTable,'Application\Model\PlansTable')->fetchAllAsArray();
		$policyForm->get('plan_id')->setAttribute('options' ,array_merge(array(''=>'-Select-'),$palns));
		
		
		$errors = array();
		if($customerId) {
			$customer = $this->getTable($this->customerTable,'Application\Model\CustomerTable')->find($customerId);
			$customerForm->get('firstname')->setValue($customer->firstname);
			$customerForm->get('lastname')->setValue($customer->lastname);
			$customerForm->get('emailid')->setValue($customer->emailid);		
			$customerForm->get('mobile_number')->setValue($customer->mobile_number);
			$customerForm->get('dob')->setValue($customer->dob);
			$customerForm->get('state_id')->setValue($customer->state_id);
			$customerForm->get('city_id')->setValue($customer->city_id);
			$customerForm->get('address')->setValue($customer->address);
			$customerForm->get('gardian_name')->setValue($customer->gardian_name);
 		}
		$request = $this->getRequest();
		if($request->isPost()) {
			$data = $request->getPost();
			if($customerId) {
				$data->id = $customerId;
			}			
			$data = $data->toArray();
			unset($data['save-customer']);	
			$saveddata = $this->getTable($this->customerTable,'Application\Model\CustomerTable')->save($data);
			if($saveddata) {
				$this->redirect()->toRoute('customers');
			}
		}
        return new ViewModel(array(
				'policyForm' 	=> $policyForm,
				'errors'	=> $errors
			)
		);
    }
	
	
	public function getTable($table, $name) {
        if (!$table) {
            $sm = $this->getServiceLocator();
            $table = $sm->get($name);
        }
        return $table;
    }
}
