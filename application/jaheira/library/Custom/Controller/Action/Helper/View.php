<?php
class Custom_Controller_Action_Helper_View
{
    public $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function init()
    {
        return $this->view;
    }
}
