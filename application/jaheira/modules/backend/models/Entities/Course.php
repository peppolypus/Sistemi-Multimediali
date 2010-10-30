<?php

class Backend_Model_Entities_Course extends Zend_Db_Table_Abstract {

    protected $_name = 'corso';
    protected $_id;
    protected $_name;
    protected $_description;
    protected $_id_user;
    protected $_tag;

    public function selectCourses()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }

    public function selectCourse($_id)
    {
        $course = $this->find($_id)->current();
        if($course)
        {
            return $course;
        }
        else
        {
            throw new Zend_Exception('Can not find the required course.');
        }
    }

    public function addCourse($_id, $_name, $_description, $_id_user, $_tag)
    {
        $row = $this->createRow();
        if($row)
        {
            $row->id = $_id;
            $row->name = $_name;
            $row->description = $_description;
            $row->id_user = $_id_user;
            $row->tag = $_tag;
            $row->save();
            return $row;
        }
        else
        {
            throw new Zend_Exception('Can not create a new course.');
        }
    }

    public function changeCourse($_id, $_name, $_description, $_id_user, $_tag)
    {
        $row = $this->find($_id)->current();
        if($row)
        {
            $row->id = $_id;
            $row->name = $_name;
            $row->description = $_description;
            $row->id_user = $_id_user;
            $row->tag = $_tag;
            $row->save();
            return $row;
        }
        else
        {
            throw new Zend_Exception('Can not find the required course.');
        }
    }

    public function deleteCourse($_id)
    {
        $course = $this->find($_id)->current();
        if($course)
        {
            $course->delete();
        }
        else
        {
            throw new Zend_Exception('Can not find the required course.');
        }
    }
}
?>
