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
            'name' => 'first_name',
            'type' => 'text',
            'options' => array(
                'label' => 'First Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'autofocus' => "",
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
                'autofocus' => "",
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
                'autofocus' => "",
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
                'autofocus' => "",
                'id' => 'mobile_no'
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
                'autofocus' => "",
                'id' => 'emailid'
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
                'autofocus' => "",
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
                'autofocus' => "",
                'id' => 'mother_name'
            ),
        ));
		
		$this->add(array(
            'name' => 'spouse',
            'type' => 'text',
            'options' => array(
                'label' => 'Spouse Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'autofocus' => "",
                'id' => 'spouse'
            ),
        ));
		
		$this->add(array(
            'name' => 'company_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Company',
                'value_options' => array(
                    '' => 'Choose one'
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'company_id',
            ),
		));
		
		$this->add(array(
            'name' => 'branch_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Branch',
                'value_options' => array(
                    '' => 'Choose one'
                ),
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
            'name' => 'country_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Country',
                'value_options' => array(
                    '' => 'Choose one',
                ),
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
                'value_options' => array(
                    '' => 'Choose one',
                ),
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
                'value_options' => array(
                    '' => 'Choose one',
                ),
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
            'name' => 'per_phoneno',
            'type' => 'text',
            'options' => array(
                'label' => 'Phone Number',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'per_phoneno'
            ),
		));
		
		$this->add(array(
            'name' => 'per_mobileno',
            'type' => 'text',
            'options' => array(
                'label' => 'Mobile Number',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'per_mobileno'
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