<?php

class Backend_Model_Repositories_Users {

    protected $_userModel;

    public function __construct()
    {
        $this->_userModel = new Backend_Model_Entities_User();
    }

    public function selectUsers()
    {
        return $this->_userModel->selectUsers();
    }

    public function selectUser($_id)
    {
        return $this->_userModel->selectUser($_id);
    }

    public function addUser($_id, $_email, $_password, $_name, $_surname, $_role, $_photo, $_biography, $_d_recording, $_d_lastaccess, $_state, $_activation)
    {
        if(!$this->_userModel->addUser($_id, $_email, $_password, $_name, $_surname, $_role, $_photo, $_biography, $_d_recording, $_d_lastaccess, $_state, $_activation))
        {
            throw new Zend_Exception('Can not create a new user.');
        }
    }

    public function changeUser($_id, $_email, $_password, $_name, $_surname, $_role, $_photo, $_biography, $_d_recording, $_d_lastaccess, $_state, $_activation)
    {
        if(!$this->_userModel->changeUser($_id, $_email, $_password, $_name, $_surname, $_role, $_photo, $_biography, $_d_recording, $_d_lastaccess, $_state, $_activation))
        {
            throw new Zend_Exception('Can not change the user.');
        }
    }

    public function deleteUser($_id)
    {
        $this->_userModel->deleteUser($_id);
    }
}
?>
