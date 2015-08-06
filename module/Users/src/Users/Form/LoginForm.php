<?php 
namespace Users\Form;
 
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Form\Element\Csrf;
 
class LoginForm extends Form {
 
    public function __construct() {
        
        parent::__construct('login');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-signin');
 
        $this->add(array(
            'name' => 'userid',
            'type' => 'text',
            'options' => array(
                'label' => 'User ID',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'autofocus' => "",
                'id' => 'userid',
                'placeholder' => 'User ID',
            ),
        ));
 
       $this->add(array(
            'name' => 'password',
            'type' => 'password',
            'options' => array(
                'label' => 'Password',
                'id' => 'password',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'password',
                'placeholder' => 'Password',
            ),
       ));
       
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',          
                'class' => 'btn btn-lg btn-primary btn-block',
                'value' => 'Sign In',
            ),
        ));
    }
}