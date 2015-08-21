<?php 
namespace Navigation\Form;
 
use Zend\Form\Element;
use Zend\Form\Form;

class MenuForm extends Form {
 
	public function __construct() {
        
		parent::__construct('Navigation');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-menu');
 
        $this->add(array(
            'name' => 'name',
            'type' => 'text',
            'options' => array(
                'label' => 'Menu Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'autofocus' => "",
                'id' => 'name'
            ),
        ));
		
		$this->add(array(
            'name' => 'parent_id',
			'required' => false,
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'State',
				'empty_option' => 'Choose one',	
                'value_options' => array(),
				'disable_inarray_validator' => true,
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'parent_id',
            ),
		));
		
		$this->add(array(
            'name' => 'description',
            'type' => 'Zend\Form\Element\Textarea',
            'options' => array(
                'label' => 'Description',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'description',
				'cols' => '50',
				'rows' => '4'
            ),
        ));
		
		$this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'is_navigation',
            'options' => array(
                'label' => 'Navigation',
                'value_options' => array(
					'1' => 'Yes',
					'0' => 'No'
				),
				'disable_inarray_validator' => true,
            ),			
			'attributes' => array(
                'class' => 'form-control',
                'id' => 'is_navigation',
            ),
        ));
	   
		$this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'active',
            'options' => array(
                'label' => 'Active',
                'value_options' => array(
					'1' => 'Yes',
					'0' => 'No'
				),
				'disable_inarray_validator' => true,
            ),			
			'attributes' => array(
                'class' => 'form-control',
                'id' => 'active',
            ),
        ));
		
        $this->add(array(
            'name' => 'iconurl',
            'type' => 'file',
            'options' => array(
                'label' => 'Icon Url',
            ),
            'attributes' => array(
                'id' => 'iconurl'
            ),
        ));
		
		$this->add(array(
            'name' => 'save-menu',
            'attributes' => array(
                'type' => 'submit',          
                'class' => 'btn btn-success',
                'value' => 'Save',
				'id'	=> 'save-menu'
            ),
        ));
		
		$this->add(array(
            'name' => 'back',
            'attributes' => array(
                'type' => 'button',          
                'class' => 'btn btn-default',
                'value' => 'back',
				'id'	=> 'back'
            ),
        ));
    }
	
}