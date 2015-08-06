<?php 
namespace Members\Form;
 
use Zend\Form\Element;
use Zend\Form\Form;

class MemberForm extends Form {
	
	protected $states;
	
	public function __construct() {
        
		parent::__construct('Member');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-member');
		
		$this->add(array(
			 'type' => 'Zend\Form\Element\Hidden',
			 'name' => 'branch_id',
			 'attributes' => array(
				 'value' => '1',
				 'id' => 'branch_id'
			 )
		));
		
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
            'type' => 'Zend\Form\Element\Select',
            'name' => 'gender',
            'options' => array(
                'label' => 'Gender',
				'empty_option' => '-Choose Gender-',
				'value_options' => array(
					 'Male' => 'Male',
					 'Female' => 'Female',
					 'Others' => 'Others',
				 ),
            ),
			'attributes' => array(
				'class' => 'form-control',
                'id' => 'gender',
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
            'type' => 'text',
            'name' => 'nominee_name',
            'options' => array(
                'label' => 'Nominee Name'
            ),
			'attributes' => array(
                'class' => 'form-control',
                'id' => 'nominee_name',
            ),
        ));	
		
		$this->add(array(
            'type' => 'text',
            'name' => 'nominee_relation',
            'options' => array(
                'label' => 'Nominee Relation'
            ),
			'attributes' => array(
                'class' => 'form-control',
                'id' => 'nominee_relation',
            ),
        ));	
		
		$this->add(array(
            'type' => 'Zend\Form\Element\Textarea',
            'name' => 'nominee_address',
            'options' => array(
                'label' => 'Nominee Address'
            ),
			'attributes' => array(
                'class' => 'form-control',
                'id' => 'nominee_address',
				'cols' => '50',
				'rows' => '3'
            ),
        ));	
		
		$this->add(array(
            'name' => 'member_id',
            'type' => 'text',
            'options' => array(
                'label' => 'Customer ID',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'customer_id',
				'readonly'=> true,
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
			 'type' => 'Zend\Form\Element\Hidden',
			 'name' => 'country_id',
			 'attributes' => array(
				 'value' => '1',
				 'id' => 'country_id'
			 )
		));
		
		$this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'state_id',
            'options' => array(
                'label' => 'State',
				'empty_option' => '-Choose State-',
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
				'empty_option' => '-Choose City-',
            ),
			'attributes' => array(
				'class' => 'form-control',
                'id' => 'city_id',
            ),
        ));
				
        $this->add(array(
            'name' => 'save',
            'attributes' => array(
                'type' => 'submit',          
                'class' => 'btn btn-success',
                'value' => 'Save',
				'id'	=> 'save-member'
            ),
        ));
		
    }	
}