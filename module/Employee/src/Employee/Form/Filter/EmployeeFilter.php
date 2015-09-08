<?php 
namespace Employee\Form\Filter;
 
use Zend\InputFilter\InputFilter;
 
class EmployeeFilter extends InputFilter {
 
    public function __construct(){
        
        $isEmpty = \Zend\Validator\NotEmpty::IS_EMPTY;
        
        $this->add(array(
            'name' => 'user_id',
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
                            $isEmpty => 'User Id can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'password',
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
                            $isEmpty => 'Password can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'cpassword',
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
                            $isEmpty => 'Confirm Password can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'employee_name',
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
                            $isEmpty => 'Employee name can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		
		$this->add(array(
            'name' => 'mobile_no',
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
                            $isEmpty => 'Mobile Number can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'email',
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
                            $isEmpty => 'Email Id can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'father_name',
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
                            $isEmpty => 'Father Name can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'mother_name',
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
                            $isEmpty => 'Mother Name can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'introducer_name',
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
                            $isEmpty => 'Introducer name can not be empty.',
                        )
                    )
                ),
            ),
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
                            $isEmpty => 'Address can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'city',
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
                            $isEmpty => 'City can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		/*$this->add(array(
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
                            $isEmpty => 'State can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'country_id',
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
                            $isEmpty => 'Country can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'company_id',
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
                            $isEmpty => 'Company can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'branch_id',
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
                            $isEmpty => 'Branch can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'role_id',
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
                            $isEmpty => 'Role can not be empty.',
                        )
                    )
                ),
            ),
        ));
		*/
		
		$this->add(array(
            'name' => 'pincode',
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
                            $isEmpty => 'Pincode can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'per_address',
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
                            $isEmpty => 'Permanent Address can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'per_city',
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
                            $isEmpty => 'Permanent City can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		/*$this->add(array(
            'name' => 'per_state_id',
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
                            $isEmpty => 'Permanent State can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'per_country_id',
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
                            $isEmpty => 'Permanent Country can not be empty.',
                        )
                    )
                ),
            ),
        ));*/
		
		$this->add(array(
            'name' => 'per_pincode',
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
                            $isEmpty => 'Permanent Pincode can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		
		$this->add(array(
            'name' => 'per_mobile_no',
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
                            $isEmpty => 'Permanent Mobile Number can not be empty.',
                        )
                    )
                ),
            ),
        ));
		

    }
}