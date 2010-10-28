<?php
class Backend_Form_Validate_Ckeditor extends Zend_Validate_Abstract
{
    const IS_EMPTY = 'isEmpty';

    protected $_messageTemplates = array(self::IS_EMPTY => 'Il testo e\' obbligatorio');

    protected $_token_key;

    public function __construct($token_key = 'fulltext')
    {
        $this->_token_key = $token_key;
    }

    public function isValid($value)
    {
        $value = (string) $value;
        $this->_setValue($value);

        $clean = strip_tags($value);
        $clean = trim($clean);
        if($clean != "" && $clean != "&nbsp;")
        {
            return true;
        }

        $this->_error(self::IS_EMPTY);
        return false;
    }
}