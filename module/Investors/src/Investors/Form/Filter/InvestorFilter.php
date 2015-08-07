<?php 
namespace Members\Form\Filter;
 
use Zend\InputFilter\InputFilter;
 
class MemberFilter extends InputFilter {
 
    public function __construct(){
        
        $isEmpty = \Zend\Validator\NotEmpty::IS_EMPTY;
        $invalidEmail = \Zend\Validator\EmailAddress::INVALID_FORMAT;
		
        $this->add(array(
            'name' => 'firstname',
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
                            $isEmpty => 'First Name can not be empty.',                            
                        )
                    )
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'lastname',
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
                            $isEmpty => 'Last Type can not be empty.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'emailid',
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
                            $isEmpty => 'Email Id can not be empty.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'dob',
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
                            $isEmpty => 'Date of Birth can not be empty.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'gardian_name',
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
                            $isEmpty => 'Gardian Name can not be empty.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'mobile_number',
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
                            $isEmpty => 'Mobile Number can not be empty.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'nominee_name',
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
                            $isEmpty => 'Nominee Name can not be empty.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'nominee_relation',
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
                            $isEmpty => 'Nominee Relation can not be empty.'
                        )
                    )
                ),				
            )
        ));
		
		$this->add(array(
            'name' => 'nominee_address',
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
                            $isEmpty => 'Nominee Address can not be empty.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'address',
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
                            $isEmpty => 'Address Date can not be empty.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'state_id',
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
                            $isEmpty => 'Please select state.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'city_id',
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
                            $isEmpty => 'Please select city.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'maxRequestDay',
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
                            $isEmpty => 'Max Request Day can not be empty.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'apiDescription',
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
                            $isEmpty => 'Description can not be empty.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'ttl',
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
                            $isEmpty => 'Ttl can not be empty.'
                        )
                    )
                )
            )
        ));
		
		$this->add(array(
            'name' => 'objectType',
            'required' => false,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            )
        ));
		
		$this->add(array(
            'name' => 'objectName',
            'required' => false,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            )
        ));
    }
}