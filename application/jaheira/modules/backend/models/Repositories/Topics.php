<?php

class Backend_Model_Repositories_Topics {

    protected $_topicModel;

    public function __construct()
    {
        $this->_topicModel = new Backend_Model_Entities_Topic();
    }

    public function selectTopics()
    {
        return $this->_topicModel->selectTopics();
    }

    public function selectTopic($_id)
    {
        return $this->_topicModel->selectTopic($_id);
    }

    public function addTopic($_id, $_description, $_id_lesson)
    {
        if(!$this->_topicModel->addTopic($_id, $_description, $_id_lesson))
        {
            throw new Zend_Exception('Can not create a new topic.');
        }
    }

    public function changeTopic($_id, $_description, $_id_lesson)
    {
        if(!$this->_topicModel->changeTopic($_id, $_description, $_id_lesson))
        {
            throw new Zend_Exception('Can not change the topic.');
        }
    }

    public function deleteTopic($_id)
    {
        $this->_topicModel->deleteTopic($_id);
    }
}
?>
