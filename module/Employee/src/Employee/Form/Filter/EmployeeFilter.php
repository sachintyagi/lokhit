<?php

namespace Employee\Form\Filter;

use Zend\InputFilter\InputFilter;

class EmployeeFilter extends InputFilter {

    public function __construct($sm) {
        $isEmpty = \Zend\Validator\NotEmpty::IS_EMPTY;
        $invalidEmail = \Zend\Validator\EmailAddress::INVALID_FORMAT;
        $recordExists = \Zend\Validator\Db\NoRecordExists::ERROR_RECORD_FOUND;
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
                            $isEmpty => 'Please select branch.'
                        )
                    )
                )
            )
        ));

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
            'required' => false,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
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
                /* array(
                  'name' => 'NotEmpty',
                  'options' => array(
                  'messages' => array(
                  $isEmpty => 'Email Id can not be empty.'
                  )
                  )
                  ), */
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
            'required' => false,
            'disable_inarray_validator' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
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
