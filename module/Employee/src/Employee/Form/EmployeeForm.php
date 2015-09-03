<?php 
namespace Employee\Form;
 
use Zend\Form\Element;
use Zend\Form\Form;

class EmployeeForm extends Form {
 
	public function __construct() {
        
		parent::__construct('Employee');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-employee');
 
        $this->add(array(
            'name' => 'user_id',
            'type' => 'text',
            'options' => array(
                'label' => 'Userid',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'user_id'
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
            'name' => 'cpassword',
            'type' => 'text',
            'options' => array(
                'label' => 'Confirm Password',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'cpassword'
            ),
        ));
		
		$this->add(array(
            'name' => 'first_name',
            'type' => 'text',
            'options' => array(
                'label' => 'First Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'first_name'
            ),
        ));
		
		$this->add(array(
            'name' => 'last_name',
            'type' => 'text',
            'options' => array(
                'label' => 'Last Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'last_name'
            ),
        ));
		
		$this->add(array(
            'name' => 'phone_no',
            'type' => 'text',
            'options' => array(
                'label' => 'Phone Number',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'phone_no'
            ),
        ));
		
		$this->add(array(
            'name' => 'mobile_no',
            'type' => 'text',
            'options' => array(
                'label' => 'Mobile Number',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'mobile_no'
            ),
        ));
		
		$this->add(array(
            'name' => 'email',
            'type' => 'text',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'email'
            ),
        ));
		
		$this->add(array(
            'name' => 'father_name',
            'type' => 'text',
            'options' => array(
                'label' => 'Father Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'father_name'
            ),
        ));
		
		$this->add(array(
            'name' => 'mother_name',
            'type' => 'text',
            'options' => array(
                'label' => 'Mother Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'mother_name'
            ),
        ));
		
		$this->add(array(
            'name' => 'spouse_name',
            'type' => 'text',
            'options' => array(
                'label' => 'Spouse Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'spouse_name'
            ),
        ));
		
		$this->add(array(
            'name' => 'blood_group',
            'type' => 'text',
            'options' => array(
                'label' => 'Blood Group',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'blood_group'
            ),
        ));
		
		$this->add(array(
            'name' => 'photo',
            'type' => 'file',
            'options' => array(
                'label' => 'Photo',
            ),
            'attributes' => array(
                'id' => 'photo'
            ),
        ));
		
		$this->add(array(
            'name' => 'company_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Company',
				'empty_option' => 'Choose one',
                'value_options' => array(),
				'disable_inarray_validator' => true,
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'company_id',
            ),
		));
		
		$this->add(array(
            'name' => 'role_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Role',
				'empty_option' => 'Choose one',
                'value_options' => array(),
				'disable_inarray_validator' => true,
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'role_id',
            ),
		));
		
		$this->add(array(
            'name' => 'branch_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Branch',
				'empty_option' => 'Choose one',
                'value_options' => array(),
				'disable_inarray_validator' => true,
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'branch_id',
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
            'name' => 'city',
            'type' => 'text',
            'options' => array(
                'label' => 'City',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'city'
            ),
        ));
 
		$this->add(array(
            'name' => 'state_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'State',
				'empty_option' => 'Choose one',
                'value_options' => array(),
				'disable_inarray_validator' => true,
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'state_id',
            ),
		));
	   
		$this->add(array(
            'name' => 'country_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Country',
				'empty_option' => 'Choose one',
                'value_options' => array(),
				'disable_inarray_validator' => true,
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'country_id',
            ),
		));
		
		$this->add(array(
            'name' => 'pincode',
            'type' => 'text',
            'options' => array(
                'label' => 'Pincode',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'pincode'
            ),
		));
		
		$this->add(array(
            'name' => 'per_address',
            'type' => 'Zend\Form\Element\Textarea',
            'options' => array(
                'label' => 'Address',				
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'per_address',
				'cols' => '50',
				'rows' => '4'
            ),
        ));
		
		$this->add(array(
            'name' => 'per_city',
            'type' => 'text',
            'options' => array(
                'label' => 'City',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'per_city'
            ),
        ));
 
		$this->add(array(
            'name' => 'per_state_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'State',
				'empty_option' => 'Choose one',
                'value_options' => array(),
				'disable_inarray_validator' => true,
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'per_state_id',
            ),
		));
	   
		$this->add(array(
            'name' => 'per_country_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Country',
				'empty_option' => 'Choose one',
                'value_options' => array(),
				'disable_inarray_validator' => true,
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'per_country_id',
            ),
		));
		
		$this->add(array(
            'name' => 'per_pincode',
            'type' => 'text',
            'options' => array(
                'label' => 'Pincode',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'per_pincode'
            ),
		));
		
		$this->add(array(
            'name' => 'per_phone_no',
            'type' => 'text',
            'options' => array(
                'label' => 'Phone Number',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'per_phone_no'
            ),
		));
		
		$this->add(array(
            'name' => 'per_mobile_no',
            'type' => 'text',
            'options' => array(
                'label' => 'Mobile Number',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'per_mobile_no'
            ),
		));
	   
		$this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'status',
            'options' => array(
                'label' => 'Active',
                'value_options' => array(
					'' => 'Choose one',
					'1' => 'Yes',
					'0' => 'No'
				),
				'disable_inarray_validator' => true,
            ),			
			'attributes' => array(
                'class' => 'form-control',
                'id' => 'status',
            ),
        ));
		
		$this->add(array(
            'name' => 'certificate',
            'type' => 'text',
            'options' => array(
                'label' => 'Certificate',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'certificate'
            ),
		));
		
		$this->add(array(
            'name' => 'university',
            'type' => 'text',
            'options' => array(
                'label' => 'University',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'university'
            ),
		));
		
		$this->add(array(
            'name' => 'year',
            'type' => 'text',
            'options' => array(
                'label' => 'Year',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'year'
            ),
		));
		
		$this->add(array(
            'name' => 'percentage',
            'type' => 'text',
            'options' => array(
                'label' => 'Percentage',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'percentage'
            ),
		));
		
		$this->add(array(
            'name' => 'previous_employer',
            'type' => 'text',
            'options' => array(
                'label' => 'Previous Employer',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'previous_employer'
            ),
		));
		
		$this->add(array(
            'name' => 'designation',
            'type' => 'text',
            'options' => array(
                'label' => 'Designation',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'designation'
            ),
		));
		
		$this->add(array(
            'name' => 'employee_from',
            'type' => 'text',
            'options' => array(
                'label' => 'From',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'employee_from'
            ),
		));
		
		$this->add(array(
            'name' => 'employee_to',
            'type' => 'text',
            'options' => array(
                'label' => 'To',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'employee_to'
            ),
		));
		
        $this->add(array(
            'name' => 'save-employee',
            'attributes' => array(
                'type' => 'submit',          
                'class' => 'btn btn-success',
                'value' => 'Save',
				'id'	=> 'save-branch'
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