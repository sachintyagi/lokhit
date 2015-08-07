<?php

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Session\Container;
use Users\Form\LoginForm;
use Users\Form\Filter\LoginFilter;

class UsersController extends AbstractActionController
{
	protected $authservice;
	
	public function loginAction()
    {
		$this->layout('layout/login');
        $request = $this->getRequest();

        $loginForm = new LoginForm('loginForm');
        $loginForm->setInputFilter(new LoginFilter());
        $errors = array();

        if ($this->getServiceLocator()->get('AuthService')->hasIdentity()) {
            return $this->redirect()->toRoute('home');
        }
		
		if ($request->isPost()) {
            $data = $request->getPost();
            $loginForm->setData($data);
            if ($loginForm->isValid()) {
                $data = $loginForm->getData();
                $this->getAuthService()
                        ->getAdapter()
                        ->setIdentity($data['userid'])
                        ->setCredential(md5($data['password']));

                $result = $this->getAuthService()->authenticate();
                if ($result->isValid()) {
                    $row = $this->getAuthService()->getAdapter()->getResultRowObject(null, 'password');
                    if($row && $row->status) {
                        $this->getAuthService()->getStorage()->write($this->getAuthService()->getAdapter()->getResultRowObject(null, 'password'));
                        return $this->redirect()->toRoute('home');
                    } else {
                        $session = new Container('User');
                        $session->getManager()->destroy();
                        $this->getAuthService()->clearIdentity();
                        $errors[] = 'Sorry! your account is disable.';
                    }
                } else {
                    foreach ($result->getMessages() as $message) {
                        $errors[] = 'Invalid login details';
                    }
                }
            } else { echo 2; exit;
                $errors = $loginForm->getMessages();
            }
        }

        return new ViewModel(array(
            'loginForm' => $loginForm,
            'errors' => $errors,
        ));
    }
	
	public function logoutAction() {
        $session = new Container('User');
        $session->getManager()->destroy();
        $this->getAuthService()->clearIdentity();        
        return $this->redirect()->toRoute('login');
    }
	
	private function getAuthService() {
        if (!$this->authservice) {
            $this->authservice = $this->getServiceLocator()->get('AuthService');
        }
        return $this->authservice;
    }
	
	public function getTable($table, $name) {
        if (!$table) {
            $sm = $this->getServiceLocator();
            $table = $sm->get($name);
        }
        return $table;
    }
}
