<?php
class Backend_UsersController extends Backend_Library_Controller_Action_Abstract
{
    public function indexAction()
    {
        $this->view->message = "index action from user controller from backend module";
    }

    public function loginAction()
    {
        $this->view->form = new Backend_Form_Login();
    }
}
