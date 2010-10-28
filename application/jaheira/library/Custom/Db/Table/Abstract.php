<?php
class Custom_Db_Table_Abstract extends Zend_Db_Table_Abstract
{
    public function __construct()
    {
        if (isset($this->_use_adapter))
        {
            $config = Zend_Registry::get($this->_use_adapter);
        }
        return parent::__construct($config);
    }
}