<?php

class Backend_Model_Repositories_Lessons {

    protected $_lessonModel;

    public function __construct()
    {
        $this->_lessonModel = new Backend_Model_Entities_Lesson();
    }

    public function selectLessons()
    {
        return $this->_lessonModel->selectLessons();
    }

    public function selectLesson($_id)
    {
        return $this->_lessonModel->selectLesson($_id);
    }

    public function addLesson($_id, $_description, $_video, $_id_course, $_enclosure)
    {
        if(!$this->_lessonModel->addLesson($_id, $_description, $_video, $_id_course, $_enclosure))
        {
            throw new Zend_Exception('Can not create a new lesson.');
        }
    }

    public function changeLesson($_id, $_description, $_video, $_id_course, $_enclosure)
    {
        if(!$this->_lessonModel->changeLesson($_id, $_description, $_video, $_id_course, $_enclosure))
        {
            throw new Zend_Exception('Can not change the lesson.');
        }
    }

    public function deleteLesson($_id)
    {
        $this->_lessonModel->deleteLesson($_id);
    }
}
?>
