<?php 
namespace Investors\Form\Filter;
 
use Zend\InputFilter\InputFilter;
 
class InstallmentFilter extends InputFilter {
 
    public function __construct(){
        
        $isEmpty = \Zend\Validator\NotEmpty::IS_EMPTY;
		
		$this->add(array(
            'name' => 'cf_number',
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
                            $isEmpty => 'CF number can not be empty.',                            
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'period',
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
                            $isEmpty => 'Period can not be empty.'
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
            'name' => 'amount',
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
                            $isEmpty => 'Installment amount can not be empty.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'installment_no',
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
                            $isEmpty => 'Installment number can not be empty.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'total_installment',
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
                            $isEmpty => 'Total installment can not be empty.',                            
                        )
                    )
                ),
            ),
        ));
	}
}