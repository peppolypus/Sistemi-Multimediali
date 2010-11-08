<?php

class Backend_Model_Entities_Lesson extends Zend_Db_Table_Abstract {

    protected $_name = 'lesson';
    protected $_id;
    protected $_description;
    protected $_video;
    protected $_id_course;
    protected $_enclosure;

    public function selectLessons()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }

    public function selectLesson($_id)
    {
        $lesson = $this->find($_id)->current();
        if($lesson)
        {
            return $lesson;
        }
        else
        {
            throw new Zend_Exception('Can not find the required lesson.');
        }
    }

    public function addLesson($_id, $_description, $_video, $_id_course, $_enclosure)
    {
        $row = $this->createRow();
        if($row)
        {
            $row->id = $_id;
            $row->description = $_description;
            $row->video = $_video;
            $row->id_course = $_id_course;
            $row->enclosure = $_enclosure;
            $row->save();
            return $row;
        }
        else
        {
            throw new Zend_Exception('Can not create a new lesson.');
        }
    }

    public function changeLesson($_id, $_description, $_video, $_id_course, $_enclosure)
    {
        $row = $this->find($_id)->current();
        if($row)
        {
            $row->id = $_id;
            $row->description = $_description;
            $row->video = $_video;
            $row->id_course = $_id_course;
            $row->enclosure = $_enclosure;
            $row->save();
            return $row;
        }
        else
        {
            throw new Zend_Exception('Can not find the required lesson.');
        }
    }

    public function deleteLesson($_id)
    {
        $lesson = $this->find($_id)->current();
        if($lesson)
        {
            $lesson->delete();
        }
        else
        {
            throw new Zend_Exception('Can not find the required lesson.');
        }
    }
}
?>