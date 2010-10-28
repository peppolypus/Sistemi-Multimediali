<?php
class Frontend_Model_Repositories_Users
{
    protected $_user_entity;

    public function __construct($user_entity)
    {
        $this->_user_entity = $user_entity;
    }

    protected $_messages = array();

    public function setMessage($name, $message)
    {
        $this->_messages[$name] = $message;
        return true;
    }

    public function getMessages()
    {
        return $this->_messages;
    }

    public function authenticate($email, $password)
    {
        $filter = new Zend_Validate_StringLength(array('min' => 5, 'max' => 25));
        if(!empty($password) && !$filter->isValid($password))
        {
            $this->setMessage('password', 'Password non valida. La lunghezza della password deve essere compresa fra 5 e 25 caratteri');
            return false;
        }

        if($this->_user_entity->loginByEmailAndPassword($email, $password) === true)
        {
            $storage = $this->_user_entity->getResultRowObject(array(
                'id', 'email'
            ));
            $storage->name = $storage->email;

            Zend_Session::rememberMe(60 * 60 * 24 * 7 * 2);
            Zend_Auth::getInstance()->getStorage()->write($storage);

            return true;
        }

        return false;
    }

    public function createUser($email, $password)
    {
        $filter = new Zend_Validate_StringLength(array('min' => 5, 'max' => 25));
        if(!$filter->isValid($password))
        {
            $this->setMessage('password', 'La lunghezza della password deve essere compresa fra 5 e 25 caratteri');
            return false;
        }

        if($this->_user_entity->findByEmail($email) !== false)
        {
            $this->setMessage('email', 'E\' gia\' presente un utente con quella mail');
            return false;
        }

        if(!$id = $this->_user_entity->create($email, $password))
        {
            $this->setMessage(null, 'Errore inaspettato. Contattare il team di supporto');
            return false;
        }

        return $id;
    }
}
?>
