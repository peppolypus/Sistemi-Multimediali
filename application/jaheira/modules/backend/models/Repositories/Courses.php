<?php

class Backend_Model_Repositories_Courses {

    protected $_courseModel;

    public function __construct()
    {
        $this->_courseModel = new Backend_Model_Entities_Course();
    }

    public function selectCourses()
    {
        return $this->_courseModel->selectCourses();
    }

    public function selectCourse($_id)
    {
        return $this->_courseModel->selectCourse($_id);
    }

    public function addCourse($_id, $_name, $_description, $_id_user, $_tag)
    {
        if(!$this->_courseModel->addCourse($_id, $_name, $_description, $_id_user, $_tag))
        {
            throw new Zend_Exception('Can not create a new course.');
        }
    }

    public function changeCourse($_id, $_name, $_description, $_id_user, $_tag)
    {
        if(!$this->_courseModel->changeCourse($_id, $_name, $_description, $_id_user, $_tag))
        {
            throw new Zend_Exception('Can not change the course.');
        }
    }

    public function deleteCourse($_id)
    {
        $this->_courseModel->deleteCourse($_id);
    }

}
?>
