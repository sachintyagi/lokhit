<?php 
namespace Company\Form;
 
use Zend\Form\Element;
use Zend\Form\Form;

class BranchForm extends Form {
 
	public function __construct() {
        
		parent::__construct('Branch');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-branch');
 
        $this->add(array(
            'name' => 'branch_name',
            'type' => 'text',
            'options' => array(
                'label' => 'Branch Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'autofocus' => "",
                'id' => 'branch_name'
            ),
        ));
		
		$this->add(array(
            'name' => 'parent_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Parent Branch',
                'value_options' => array(
                    '' => 'Choose one',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'parent_id',
            ),
		));
		
		$this->add(array(
            'name' => 'company_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Company Name',
                'value_options' => array(
                    '' => 'Choose one',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'company_id',
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
            'name' => 'save-branch',
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