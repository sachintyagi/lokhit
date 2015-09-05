<?php 
namespace Investors\Form;
 
use Zend\Form\Element;
use Zend\Form\Form;

class InvestorForm extends Form {
	
	protected $states;
	
	public function __construct() {
        
		parent::__construct('Investor');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-member');
		
		$this->add(array(
            'name' => 'member_id',
            'type' => 'text',
            'options' => array(
                'label' => 'Member ID',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'member_id',				
            ),
        ));
		
        $this->add(array(
                 'type' => 'Zend\Form\Element\Hidden',
                 'name' => 'branch_id',
                 'attributes' => array(
                         'value' => '1',
                         'id' => 'branch_id'
                 )
        ));
        
        $this->add(array(
            'name' => 'employee_code',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Agent',
                'empty_option' => '-Choose Agent-',
                'value_options' => array(),	
            ),
            'attributes' => array(
                'class' => 'form-control',
                'value' => '1',
                'id' => 'employee_code'
            )
        ));
		
        $this->add(array(
            'name' => 'name',
            'type' => 'text',
            'options' => array(
                'label' => 'Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'name',
				'disabled'=>true,	
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
				'disabled'=>true,				
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
                'id' => 'emailid',
				'disabled'=>true,	
            ),
        ));
		
		$this->add(array(
            'name' => 'mobile_number',
            'type' => 'text',
            'options' => array(
                'label' => 'Mobile Number',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'mobile_number',
				'disabled'=>true,	
            ),
        ));
		
		$this->add(array(
            'name' => 'nominee_name',
            'type' => 'text',
            'options' => array(
                'label' => 'Nominee Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'nominee_name',
				'disabled'=>true,	
            ),
        ));
		
		$this->add(array(
            'name' => 'nominee_relation',
            'type' => 'text',
            'options' => array(
                'label' => 'Nominee Relation',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'nominee_relation',
				'disabled'=>true,	
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
				'rows' => '4',
				'disabled'=>true,	
            ),
        ));
		
		$this->add(array(
            'name' => 'plan_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Paln',
				'empty_option' => '-Choose Plan-',
				'value_options' => array(
					 '1' => 'FD',
					 '2' => 'RD',
					 '3' => 'DDS',
					 //'4' => 'MIS',
				),	
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'plan_id',
            ),
        ));
		
		$this->add(array(
            'name' => 'duration',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Duration',
				'empty_option' => '-Choose Plan Maturity Time-',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'duration',
            ),
        ));
		
		$this->add(array(
            'name' => 'installment_type',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Installment',
				'empty_option' => '-Choose Installment Type-',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'installment_type',
            ),
        ));
		
		$this->add(array(
            'name' => 'start_ammount',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Amount',
				'value_options' => array(
					' ' => '-Choose Deposite Amount-',
				),	
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'start_ammount',
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
            'name' => 'installment_ammount',
            'type' => 'text',
            'options' => array(
                'label' => 'Installment Amount',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'installment_ammount',
				'readonly' => true,
            ),
        ));
		
		$this->add(array(
            'name' => 'installment_date',
            'type' => 'text',
            'options' => array(
                'label' => 'Installment Date',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'installment_date',
				'readonly'=>true,
            ),
        ));
		
		$this->add(array(
            'name' => 'final_ammount',
            'type' => 'text',
            'options' => array(
                'label' => 'Ammount',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'final_ammount',
				'readonly'=>true,
            ),
        ));	
		
		$this->add(array(
            'name' => 'end_date',
            'type' => 'text',
            'options' => array(
                'label' => 'Maturity Date',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'end_date',
				'readonly'=>true,
            ),
        ));
		
		$this->add(array(
			 'type' => 'Zend\Form\Element\Hidden',
			 'name' => 'start_date',
			 'attributes' => array(
				 'value' => date('Y-m-d H:i:s'),
				 'id' => 'start_date'
			 )
		));
		
		$this->add(array(
			 'type' => 'Zend\Form\Element\Hidden',
			 'name' => 'formula_id',
			 'attributes' => array(
				 'value' => date('Y-m-d H:i:s'),
				 'id' => 'formula_id'
			 )
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