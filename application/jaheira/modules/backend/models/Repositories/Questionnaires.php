<?php

class Backend_Model_Repositories_Questionnaires {

    protected $_questionnaireModel;

    public function __construct()
    {
        $this->_questionnaireModel = new Backend_Model_Entities_Questionnaire();
    }

    public function selectQuestionnaires()
    {
        return $this->_questionnaireModel->selectQuestionnaires();
    }

    public function selectQuestionnaire($_id_topic, $_id_question)
    {
        return $this->_questionnaireModel->selectQuestionnaire($_id_topic, $_id_question);
    }

    public function addQuestionnaire($_id_topic, $_id_question, $_question, $_answers)
    {
        if(!$this->_questionnaireModel->addQuestionnaire($_id_topic, $_id_question, $_question, $_answers))
        {
            throw new Zend_Exception('Can not create a new questionnaire.');
        }
    }

    public function changeQuestionnaire($_id_topic, $_id_question, $_question, $_answers)
    {
        if(!$this->_questionnaireModel->changeQuestionnaire($_id_topic, $_id_question, $_question, $_answers))
        {
            throw new Zend_Exception('Can not change the questionnaire.');
        }
    }

    public function deleteQuestionnaire($_id_topic, $_id_question)
    {
        $this->_questionnaireModel->deleteQuestionnaire($_id_topic, $_id_question);
    }
}
?>

