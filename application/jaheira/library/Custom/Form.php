<?php
Class Custom_Form extends Zend_Form
{
    public function setAction($action)
    {
        $url = rtrim($this->getBaseUrl(), '/') .$action;
        return parent::setAction($url);
    }

    public function getBaseUrl()
    {
            return $this->getView()->baseUrl();
    }
}