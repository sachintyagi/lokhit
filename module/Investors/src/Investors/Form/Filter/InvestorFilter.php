<?php 
namespace Investors\Form\Filter;
 
use Zend\InputFilter\InputFilter;
 
class InvestorFilter extends InputFilter {
 
    public function __construct(){
        
        $isEmpty = \Zend\Validator\NotEmpty::IS_EMPTY;
		
		$this->add(array(
            'name' => 'member_id',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            $isEmpty => 'Member code can not be empty.',                            
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'plan_id',
            'required' => true,
			'disable_inarray_validator' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
			'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            $isEmpty => 'Please choose plan.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'duration',
            'required' => true,
			'disable_inarray_validator' => false,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
			'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            $isEmpty => 'Please choose maturity time.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'installment_type',
            'required' => true,
			'disable_inarray_validator' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
			'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            $isEmpty => 'Please choose installment type.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'start_ammount',
            'required' => true,
			'disable_inarray_validator' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
			'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            $isEmpty => 'Please choose deposite amount.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'interest_rate',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            $isEmpty => 'Interest rate can not be empty.',                            
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'installment_ammount',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            $isEmpty => 'Installment amount can not be empty.',                            
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'installment_date',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            $isEmpty => 'Installment date can not be empty.',                            
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'final_ammount',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            $isEmpty => 'Maturity amount can not be empty.',                            
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'end_date',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            $isEmpty => 'Maturity date can not be empty.',                            
                        )
                    )
                ),
            ),
        ));
	}
}