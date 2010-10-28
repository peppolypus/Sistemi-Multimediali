<?php
class Frontend_Form_Signup extends Custom_Form
{
    protected $_user_repository;

    public function setUserRepository($user_repository)
    {
        $this->_user_repository = $user_repository;
    }

    public function __construct($options = null)
    {
        parent::__construct($options);

        $this->setName('create_account');

        $element = new Zend_Form_Element_Text('email', array('disableLoadDefaultDecorators' => true));
        $element->addDecorator('ViewHelper')
                ->setRequired(true)
                ->addValidator('EmailAddress')
                ->addErrorMessage('Fornire un indirizzo email');
        $this->addElement($element);

        $element = new Zend_Form_Element_Password('password', array('disableLoadDefaultDecorators' => true));
        $element->addDecorator('ViewHelper')
                ->setRequired(true)
                ->setAttrib('autocomplete', 'off')
                ->addErrorMessage('Fornire una password');
        $this->addElement($element);

        $element = new Zend_Form_Element_Password('confirm_password', array('disableLoadDefaultDecorators' => true));
        $element->addDecorator('ViewHelper')
                ->setRequired(true)
                ->setAttrib('autocomplete', 'off')
                ->addValidator(new Frontend_Form_Validate_IdenticalFormValues('password'), true)
                ->addErrorMessage('Le due password non corrispondono');
        $this->addElement($element);

        $element = new Zend_Form_Element_Hash('___h', array('disableLoadDefaultDecorators' => true));
        $element->setSalt('unique')
                ->addDecorator('ViewHelper')
                ->addErrorMessage('Il form non puo\' essere reinviato');
        $this->addElement($element);
        /*
        $captcha_session = new Zend_Session_Namespace('captcha');
        if($captcha_session->tries > 3)
        {
            $recaptcha = new Zend_Service_ReCaptcha('6LfK4r0SAAAAABA5P5icMZayuRyiEOeot0k_uhW5', '6LfK4r0SAAAAAJu-NmK7-30Ng4-0J2oe0R15iIoo');
            $recaptcha->setOption('theme', 'clean');
            $element = new Zend_Form_Element_Captcha('captcha',
                array(
                    'disableLoadDefaultDecorators' => true,
                    'captcha' => 'ReCaptcha',
                    'captchaOptions' => array(
                        'captcha' => 'ReCaptcha',
                        'service' => $recaptcha
                    )
                )
            );
            $element->addErrorMessage('Codice di sicurezza non valido');
            $this->addElement($element);
        }
        */
        $this->clearDecorators();
        $this->addDecorator('FormElements');
        $this->addDecorator('Form');
    }

    public function isValid($data)
    {
        if(!parent::isValid($data))
        {
            //$this->_incrementCaptcha();
            return false;
        }

        if(!$id = $this->_user_repository->createUser($data['email'], $data['password']))
        {
            foreach($this->_user_repository->getMessages() as $element_name => $message)
            {
                $this->addErrors(array($message));
            }
            //$this->_incrementCaptcha();
            return false;
        }

        return $id;
    }

    protected function _incrementCaptcha()
    {
        $captcha_session = new Zend_Session_Namespace('captcha');
        if(empty($captcha_session->tries))
        {
            $captcha_session->tries = 0;
        }
        $captcha_session->tries = $captcha_session->tries + 1;
    }
}