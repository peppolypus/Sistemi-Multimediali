<?php

class Backend_Model_Entities_Topic extends Zend_Db_Table_Abstract {

    protected $_name = 'topic';
    protected $_id;
    protected $_description;
    protected $_id_lesson;

    public function selectTopics()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }

    public function selectTopic($_id)
    {
        $topic = $this->find($_id)->current();
        if($topic)
        {
            return $topic;
        }
        else
        {
            throw new Zend_Exception('Can not find the required topic.');
        }
    }

    public function addTopic($_id, $_description, $_id_lesson)
    {
        $row = $this->createRow();
        if($row)
        {
            $row->id = $_id;
            $row->description = $_description;
            $row->id_course = $_id_lesson;
            $row->save();
            return $row;
        }
        else
        {
            throw new Zend_Exception('Can not create a new topic.');
        }
    }

    public function changeTopic($_id, $_description, $_id_lesson)
    {
        $row = $this->find($_id)->current();
        if($row)
        {
            $row->id = $_id;
            $row->description = $_description;
            $row->id_course = $_id_lesson;
            $row->save();
            return $row;
        }
        else
        {
            throw new Zend_Exception('Can not find the required topic.');
        }
    }

    public function deleteTopic($_id)
    {
        $topic = $this->find($_id)->current();
        if($topic)
        {
            $topic->delete();
        }
        else
        {
            throw new Zend_Exception('Can not find the required topic.');
        }
    }
}
?>