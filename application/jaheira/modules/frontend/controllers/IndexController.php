<?php
class IndexController extends Frontend_Library_Controller_Action_Abstract
{
    public function indexAction()
    {
        $this->view->message = "Modificare Layout e Css";
    }
}