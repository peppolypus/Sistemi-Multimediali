<?php
class UsersController extends Frontend_Library_Controller_Action_Abstract
{
    public function indexAction()
    {
        return $this->redirect('users', 'login');
    }

    public function loginAction()
    {
        Zend_Layout::getMvcInstance()->setLayout('public');

        $form = new Frontend_Form_Login(
                array(
                    'userRepository' => Frontend_Model_Repositories_UsersFactory::factory()
                    )
                );

        if($this->_request->isPost())
        {
            $data = $this->_request->getPost();
            if($form->isValid($data))
            {
                return $this->redirect('index', 'index');
            }
            $form->setDefaults($data);
        }

        $this->view->form = $form;
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        return $this->redirect('users', 'login');
    }

    public function signupAction()
    {
        Zend_Layout::getMvcInstance()->setLayout('public');
        $user_repository = Frontend_Model_Repositories_UsersFactory::factory();
        $form = new Frontend_Form_Signup(array('userRepository' => $user_repository));

        if($this->_request->isPost())
        {
            $data = $this->_request->getPost();
            if($id = $form->isValid($data))
            {
                $user_repository->authenticate($data['email'], $data['password']);
                return $this->redirect('index', 'index');
            }
            $form->setDefaults($data);
        }
        $this->view->form = $form;
    }
}
