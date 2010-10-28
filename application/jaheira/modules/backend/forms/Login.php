<?php
class Backend_Form_Login extends Zend_Form
{
    public function init()
    {
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')
                ->setRequired(true)
                ->addValidator('EmailAddress')
                ->removeDecorator('Errors');
        $this->addElement($email);

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password')
                ->setRequired(true)
                ->removeDecorator('Errors');
        $this->addElement($password);

        $this->addElement('submit', 'submit', array('label' => 'Login'));
    }
}