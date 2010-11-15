<?php

class Backend_Model_Entities_User extends Zend_Db_Table_Abstract {

    protected $_name = 'user';
    protected $_id;
    protected $_email;
    protected $_password;
    protected $_name;
    protected $_surname;
    protected $_role;
    protected $_photo;
    protected $_biography;
    protected $_d_recording;
    protected $_d_lastaccess;
    protected $_state;
    protected $_activation;

    public function selectUsers()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }

    public function selectUser($_id)
    {
        $user = $this->find($_id)->current();
        if($user)
        {
            return $user;
        }
        else
        {
            throw new Zend_Exception('Can not find the required user.');
        }
    }

    public function addUser($_id, $_email, $_password, $_name, $_surname, $_role, $_photo, $_biography, $_d_recording, $_d_lastaccess, $_state, $_activation)
    {
        $row = $this->createRow();
        if($row)
        {
            $row->id = $_id;
            $row->email = $_email;
            $row->password = $_password;
            $row->name = $_name;
            $row->surname = $_surname;
            $row->role = $_role;
            $row->photo = $_photo;
            $row->biography = $_biography;
            $row->d_recording = $_d_recording;
            $row->d_lastaccess = $_d_lastaccess;
            $row->state = $_state;
            $row->activation = $_activation;
            $row->save();
            return $row;
        }
        else
        {
            throw new Zend_Exception('Can not create a new user.');
        }
    }

    public function changeUser($_id, $_email, $_password, $_name, $_surname, $_role, $_photo, $_biography, $_d_recording, $_d_lastaccess, $_state, $_activation)
    {
        $row = $this->find($_id)->current();
        if($row)
        {
            $row->id = $_id;
            $row->email = $_email;
            $row->password = $_password;
            $row->name = $_name;
            $row->surname = $_surname;
            $row->role = $_role;
            $row->photo = $_photo;
            $row->biography = $_biography;
            $row->d_recording = $_d_recording;
            $row->d_lastaccess = $_d_lastaccess;
            $row->state = $_state;
            $row->activation = $_activation;
            $row->save();
            return $row;
        }
        else
        {
            throw new Zend_Exception('Can not find the required user.');
        }
    }

    public function deleteUser($_id)
    {
        $user = $this->find($_id)->current();
        if($user)
        {
            $user->delete();
        }
        else
        {
            throw new Zend_Exception('Can not find the required user.');
        }
    }
}
?>