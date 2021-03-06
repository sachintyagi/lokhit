<?php 
namespace Application\Form;
 
use Zend\Form\Element;
use Zend\Form\Form;

class CustomerForm extends Form {
	
	protected $states;
	
	public function __construct() {
        
		parent::__construct('Customer');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-customet');
 
        $this->add(array(
            'name' => 'firstname',
            'type' => 'text',
            'options' => array(
                'label' => 'First Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'firstname'
            ),
        ));
 
       $this->add(array(
            'name' => 'lastname',
            'type' => 'text',
            'options' => array(
                'label' => 'Last Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'lastname',
            ),
       ));
	   $this->add(array(
            'name' => 'dob',
            'type' => 'text',
            'options' => array(
                'label' => 'Date Of Birth',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'dob',
            ),
       ));
	   
	   $this->add(array(
            'name' => 'customer_id',
            'type' => 'text',
            'options' => array(
                'label' => 'Customer ID',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'customer_id'
            ),
        ));
		
		$this->add(array(
            'name' => 'address',
            'type' => 'Zend\Form\Element\Textarea',
            'options' => array(
                'label' => 'Address',				
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'address',
				'cols' => '50',
				'rows' => '4'
            ),
        ));
		
		$this->add(array(
            'name' => 'emailid',
            'type' => 'text',
            'options' => array(
                'label' => 'Email Id',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'emailid'
            ),
        ));
		
		$this->add(array(
            'name' => 'policy_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Policy',
				'value_options' => array(
                    '' => 'Choose one',
                ),
            ),
            'attributes' => array(
				'class' => 'form-control',
                'id' => 'policy_id'
            ),
        ));
		
		$this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'state_id',
            'options' => array(
                'label' => 'State',
				'value_options' => array(
                    '' => 'Choose one',
                ),
            ),
			'attributes' => array(
				'class' => 'form-control',
                'id' => 'state_id',
            ),
        ));
		
		$this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'city_id',
            'options' => array(
                'label' => 'City',
				'value_options' => array(
                    '' => 'Choose one',
                ),
            ),
			'attributes' => array(
				'class' => 'form-control',
                'id' => 'city_id',
            ),
        ));
		
		$this->add(array(
            'name' => 'password',
            'type' => 'text',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes' => array(
				'class' => 'form-control',
				'id' => 'password'
            ),
        ));
	   
		$this->add(array(
            'type' => 'text',
            'name' => 'gardian_name',
            'options' => array(
                'label' => 'Gardian Name'
            ),
			'attributes' => array(
				'class' => 'form-control',
                'id' => 'gardian_name',
            ),
        ));
		
		$this->add(array(
            'type' => 'text',
            'name' => 'mobile_number',
            'options' => array(
                'label' => 'Mobile Number'
            ),
			'attributes' => array(
                'class' => 'form-control',
                'id' => 'mobile_number',
            ),
        ));
				
        $this->add(array(
            'name' => 'save-customer',
            'attributes' => array(
                'type' => 'submit',          
                'class' => 'btn btn-success',
                'value' => 'Save',
				'id'	=> 'save-customer'
            ),
        ));
		
		$this->add(array(
            'name' => 'reset',
            'attributes' => array(
                'type' => 'reset',          
                'class' => 'btn btn-default',
                'value' => 'Reset',
				'id'	=> 'reset'
            ),
        ));
    }	
}