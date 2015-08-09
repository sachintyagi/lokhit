<?php 
namespace Investors\Form;
 
use Zend\Form\Element;
use Zend\Form\Form;

class InstallmentForm extends Form {
	
	public function __construct() {
        
		parent::__construct('Installment');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-member');
		
		$this->add(array(
            'name' => 'cf_number',
            'type' => 'text',
            'options' => array(
                'label' => 'Customer ID',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'cf_number',
				'autocomplete'=>'off',
            ),
        ));
		
		$this->add(array(
            'name' => 'investment_id',
            'type' => 'Zend\Form\Element\Hidden',
            'options' => array(
                'label' => 'Investment id',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'investment_id',
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
                'id' => 'member_id',
				'disabled' => true,	
            ),
        ));
		
		$this->add(array(
            'name' => 'period',
            'type' => 'text',
            'options' => array(
                'label' => 'Period',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'period',
				'readonly'=>true,	
            ),
        ));
		
		$this->add(array(
            'name' => 'interest_rate',
            'type' => 'text',
            'options' => array(
                'label' => 'Interest Rate',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'interest_rate',
				'readonly'=>true,	
            ),
        ));
		
		$this->add(array(
            'name' => 'amount',
            'type' => 'text',
            'options' => array(
                'label' => 'Amount',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'amount',
				'readonly'=>true,	
            ),
        ));
		
		$this->add(array(
            'name' => 'installment_no',
            'type' => 'text',
            'options' => array(
                'label' => 'Installment No',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'installment_no',
				'readonly'=>true,	
            ),
        ));
		
		$this->add(array(
            'name' => 'total_installment',
            'type' => 'text',
            'options' => array(
                'label' => 'Total Installment',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'total_installment',
				'readonly'=>true,	
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