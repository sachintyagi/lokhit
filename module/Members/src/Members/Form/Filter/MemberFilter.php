<?php 
namespace Members\Form\Filter;
 
use Zend\InputFilter\InputFilter;
 
class MemberFilter extends InputFilter {
 
	public function __construct($sm){
		$isEmpty = \Zend\Validator\NotEmpty::IS_EMPTY;
		//$notInArray = \Zend\Validator\InArray::NOT_IN_ARRAY;
        $invalidEmail = \Zend\Validator\EmailAddress::INVALID_FORMAT;
		$recordExists = \Zend\Validator\Db\NoRecordExists::ERROR_RECORD_FOUND;
		
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
                            $isEmpty => 'S/o, D/o, W/o Name can not be empty.'
                        )
                    )
                )
            )
        ));
       
		$this->add(array(
            'name' => 'emailid',
            'required' => false,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                /*array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            $isEmpty => 'Email Id can not be empty.'
                        )
                    )
                ),*/
				array(
                    'name' => 'EmailAddress',
                    'options' => array(
                        'domain' => 'true',
                        'hostname' => 'true',
                        'mx' => 'true',
                        'deep' => 'true',
                        'message' => array(
                            $invalidEmail => 'Invalid email address.',
							//$isEmpty => 'Email Id can not be empty.'
                        ),
                    ),
                ),
				array(
                    'name' => 'Db\NoRecordExists',
                    'options' => array(
                        'table' => 'members',
                        'field' => 'emailid',
                        'adapter' => $sm->get('Zend\Db\Adapter\Adapter'),
						'message' => array(
                            $recordExists => 'Email address already register with us.',
                        ),
                    ),
                ),
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
            'name' => 'gender',
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
                            $isEmpty => 'Gender can not be empty.',
							//$notInArray => 'Please choose a gender'
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
    }
}