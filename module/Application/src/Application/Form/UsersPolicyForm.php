<?php 
namespace Application\Form;
 
use Zend\Form\Element;
use Zend\Form\Form;

class UsersPolicyForm extends Form {
	
	public function __construct() {
        
		parent::__construct('UserPolicy');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-customet');
 
        $this->add(array(
            'name' => 'customer_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Customer',
				'value_options' => array(
                    '' => '-Select-',
                ),
            ),
            'attributes' => array(
				'class' => 'form-control',
                'id' => 'customer_id'
            ),
        ));
 
       $this->add(array(
            'name' => 'plan_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Plan',
				'value_options' => array(
                    '' => '-Select-',
                ),
            ),
            'attributes' => array(
				'class' => 'form-control',
                'id' => 'plan_id'
            ),
       ));
	   $this->add(array(
            'name' => 'issue_date',
            'type' => 'text',
            'options' => array(
                'label' => 'Policy Date',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'issue_date',
				'value' => date('Y-m-d'),
            ),
       ));
	   
	   $this->add(array(
            'name' => 'nominee_name',
            'type' => 'text',
            'options' => array(
                'label' => 'Nominee',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'nominee_name'
            ),
        ));
		
		$this->add(array(
            'name' => 'mode_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Mode',
				'value_options' => array(
                    '' => '-Select-',
                ),
            ),
            'attributes' => array(
				'class' => 'form-control',
                'id' => 'mode_id'
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