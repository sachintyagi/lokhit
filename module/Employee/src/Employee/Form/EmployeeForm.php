<?php

namespace Employee\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class EmployeeForm extends Form {

    protected $states;

    public function __construct($sm) {

        parent::__construct('Member');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-member');

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'branch_id',
            'options' => array(
                'label' => 'Branch',
                'empty_option' => '-Choose Branch-',
                'value_options' => array(
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'branch_id',
            ),
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'role_id',
            'options' => array(
                'label' => 'Role',
                'empty_option' => '-Choose Role-',
                'value_options' => array(
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'role_id',
            ),
        ));
        
        $this->add(array(
            'name' => 'company_id',
            'type' => 'hidden',
            'options' => array(
                'label' => 'Company Id',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'company_id',
                'maxlength' => 100,
            ),
        ));
        $this->add(array(
            'name' => 'userid',
            'type' => 'text',
            'options' => array(
                'label' => 'Login Id',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'userid',
                'maxlength' => 100,
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'text',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'password',
                'maxlength' => 20,
            ),
        ));

        $this->add(array(
            'name' => 'employee_code',
            'type' => 'text',
            'options' => array(
                'label' => 'Employee Code',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'employee_code',
                'maxlength' => 100,
                'readonly' => true
            ),
        ));

        $this->add(array(
            'name' => 'introducer_code',
            'type' => 'text',
            'options' => array(
                'label' => 'Introducer Code',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'introducer_code',
                'maxlength' => 100,
            ),
        ));
        
        $this->add(array(
            'name' => 'firstname',
            'type' => 'text',
            'options' => array(
                'label' => 'First Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'firstname',
                'maxlength' => 100,
            ),
        ));

        $this->add(array(
            'name' => 'lastname',
            'type' => 'text',
            'options' => array(
                'label' => 'Last Name',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'lastname',
                'maxlength' => 100,
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
                'maxlength' => 255,
            ),
        ));

        $this->add(array(
            'name' => 'dob',
            'type' => 'text',
            'options' => array(
                'label' => 'Date Of Birth',
            ),
            'attributes' => array(
                'class' => 'form-control datepicker',
                'id' => 'dob',
                'readonly' => true,
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'gender',
            'options' => array(
                'label' => 'Gender',
                'empty_option' => '-Choose Gender-',
                'value_options' => array(
                    'Male' => 'Male',
                    'Female' => 'Female',
                    'Others' => 'Others',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'gender',
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'type' => 'text',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'password',
                'maxlength' => 20,
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
                'maxlength' => 200,
            ),
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'mobile_number',
            'options' => array(
                'label' => 'Mobile Number'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'mobile_number',
                'maxlength' => 10,
            ),
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'nominee_name',
            'options' => array(
                'label' => 'Nominee Name'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'nominee_name',
                'maxlength' => 200,
            ),
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'nominee_relation',
            'options' => array(
                'label' => 'Nominee Relation'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'nominee_relation',
                'maxlength' => 50,
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Textarea',
            'name' => 'nominee_address',
            'options' => array(
                'label' => 'Nominee Address'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'nominee_address',
                'cols' => '50',
                'rows' => '4',
                'maxlength' => 200,
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
                'id' => 'customer_id',
                //'readonly' => true,
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
                'maxlength' => 300,
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'country_id',
            'options' => array(
                'label' => 'State',
                'value_options' => array('95' => 'India')
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'country_id'
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'state_id',
            'options' => array(
                'label' => 'State',
                'empty_option' => '-Choose State-',
                'value_options' => $sm->get('Application\Model\StateTable')->fetchAllAsArray()
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'state_id',
            ),
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'city_id',
            'options' => array(
                'label' => 'City',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'city_id',
            ),
        ));

        $this->add(array(
            'name' => 'save',
            'attributes' => array(
                'type' => 'submit',
                'class' => 'btn btn-success',
                'value' => 'Save',
                'id' => 'save-member'
            ),
        ));
    }

}
