<?php
class Frontend_Form_Login extends Custom_Form
{
    protected $_user_repository;

    public function setUserRepository($user_repository)
    {
        $this->_user_repository = $user_repository;
    }

    public function __construct($options = null)
    {
        parent::__construct($options);

        $this->setName('login');

        $element = new Zend_Form_Element_Text('email', array('disableDefaultDecorators' => true));
        $element->addDecorator('ViewHelper')
                ->addValidator('EmailAddress')
                ->setRequired(true)
                ->addErrorMessage('La mail e\' obbligatoria');
        $this->addElement($element);

        $element = new Zend_Form_Element_Password('password', array('disableDefaultDecorators' => true));
        $element->addDecorator('ViewHelper')
                ->setRequired(true)
                ->addErrorMessage('La password e\' obbligatoria');
        $this->addElement($element);

        $element = new Zend_Form_Element_Hash('___h', array('disableDefaultDecorators' => true));
        $element->setSalt('unique')
                ->addDecorator('ViewHelper')
                ->addErrorMessage('Il form non deve essere reinviato.');
        $this->addElement($element);
        /*
        $captcha_session = new Zend_Session_Namespace('captcha');

        if($captcha_session->tries > 3)
        {
            $recaptcha = new Zend_Service_ReCaptcha('6LfK4r0SAAAAABA5P5icMZayuRyiEOeot0k_uhW5', '6LfK4r0SAAAAAJu-NmK7-30Ng4-0J2oe0R15iIoo');
            $recaptcha->setOption('theme', 'clean');
            $element = new Zend_Form_Element_Captcha('captcha', array(
                    'disableDefaultDecorators' => true,
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
        $this->addDecorator('FormElements')->addDecorator('Form');
    }

    public function isValid($data)
    {
        if(parent::isValid($data))
        {
            if($this->_user_repository->authenticate($data['email'], $data['password']))
            {
                Zend_Session::namespaceUnset('captcha');
                return true;
            }
            else
            {
                $this->setErrors(array('Email o password non validi'));
            }
        }
        /*
        $captcha_session = new Zend_Session_Namespace('captcha');
        if(empty($captcha_session->tries))
        {
            $captcha_session->tries = 0;
        }
        $captcha_session->tries = $captcha_session->tries + 1;
         * */
        return false;
    }
}
?>
