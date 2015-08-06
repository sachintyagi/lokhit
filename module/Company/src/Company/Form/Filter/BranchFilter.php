<?php 
namespace Company\Form\Filter;
 
use Zend\InputFilter\InputFilter;
 
class BranchFilter extends InputFilter {
 
    public function __construct(){
        
        $isEmpty = \Zend\Validator\NotEmpty::IS_EMPTY;
        
        $this->add(array(
            'name' => 'branch_name',
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
                            $isEmpty => 'Branch Name can not be empty.',
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
            'name' => 'phone_no',
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
                            $isEmpty => 'Phone Number can not be empty.',
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
            'name' => 'status',
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
                            $isEmpty => 'Status can not be empty.',
                        )
                    )
                ),
            ),
        ));
		
		$this->add(array(
            'name' => 'logo',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
				array(
					'name' => 'Zend\Validator\File\Size',
					'options' => array(
						'min' => 120,
						'max' => 10485760,
					),
				),
				array(
					'name' => 'Zend\Validator\File\Extension',
					'options' => array(
						'extension' => array('png','jpeg','jpg'),
						'case '	=> true
					),
				),
				array(
					'name'    => 'Zend\Validator\File\MimeType',
					'options' => array(
					   'mimeType' => array('image/jpeg','image/jpg','image/png'),
					),
				),
			),
        ));
    }
}