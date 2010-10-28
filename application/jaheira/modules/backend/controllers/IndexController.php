<?php
class Backend_IndexController extends Backend_Library_Controller_Action_Abstract
{
    public function indexAction()
    {
        $this->view->message = "Bye";
    }
}