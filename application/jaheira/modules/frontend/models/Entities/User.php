<?php
class Frontend_Model_Entities_User extends Custom_Db_Table_Abstract
{
    protected $_name = 'users';
    protected $_use_adapter = 'front_db';
    protected $_auth_adapter;

    const PASSWORD_HASH = 'a1f028340707bc484144335d5c6f600c30ceaa11';

    public function loginByEmailAndPassword($email, $password)
    {
        $password = $this->_encryptPassword($password);

        $this->_auth_adapter = new Zend_Auth_Adapter_DbTable($this->getAdapter());
        $this->_auth_adapter->setTableName($this->_name)
                ->setIdentityColumn('email')
                ->setCredentialColumn('password');

        $this->_auth_adapter->setIdentity($email)
                ->setCredential($password);

        $result = Zend_Auth::getInstance()->authenticate($this->_auth_adapter);
        return $result->isValid();
    }

    public function getResultRowObject($returnColumns, $omitColumns = array())
    {
        return $this->_auth_adapter->getResultRowObject($returnColumns, $omitColumns);
    }

    protected function _encryptPassword($value)
    {
        for($i = 0; $i < 10; $i++)
        {
            $value = md5($value . self::PASSWORD_HASH);
        }
        return $value;
    }

    public function findByEmail($email)
    {
        $result = $this->fetchRow($this->getAdapter()->quoteInto('email = ?', $email));
        if(!empty($result))
            return $result;
        return false;
    }

    public function create($email, $password)
    {
        $user = $this->createRow();
        $user->email = $email;
        $user->password = $this->_encryptPassword($password);

        try
        {
            $user->save();
            return $user->id;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

}