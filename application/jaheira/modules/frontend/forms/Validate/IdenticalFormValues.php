<?php
class Frontend_Form_Validate_IdenticalFormValues extends Zend_Validate_Abstract
{
    const NOT_MATCH = 'notMatch';

    protected $_messageTemplates = array(self::NOT_MATCH => 'I valori non corrispondono');

    protected $_token_key;

    public function __construct($token_key = 'confirm_password')
    {
        $this->_token_key = $token_key;
    }

    public function isValid($value,$context = null)
    {
        $value = (string) $value;
        $this->_setValue($value);

        if(is_array($context))
        {
            if(isset($context[$this->_token_key]) && ($value == $context[$this->_token_key]))
            {
                return true;
            }
        }
        elseif($value == $context)
        {
            return true;
        }

        $this->_error(self::NOT_MATCH);
        return false;
    }
}