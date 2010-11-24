<?php

class Backend_Model_Entities_Questionnaire extends Zend_Db_Table_Abstract {

    protected $_name = 'questionnaire';
    protected $_id_topic;
    protected $_id_question;
    protected $_question;
    protected $_answers;

    public function selectQuestionnaires()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }

    public function selectQuestionnaire($_id_topic, $_id_question)
    {
        $questionnaire = $this->find($_id_topic, $_id_question)->current();
        if($questionnaire)
        {
            return $questionnaire;
        }
        else
        {
            throw new Zend_Exception('Can not find the required questionnaire.');
        }
    }

    public function addQuestionnaire($_id_topic, $_id_question, $_question, $_answers)
    {
        $row = $this->createRow();
        if($row)
        {
            $row->id_topic = $_id_topic;
            $row->id_question = $_id_question;
            $row->question = $_question;
            $row->answers = $_answers;
            $row->save();
            return $row;
        }
        else
        {
            throw new Zend_Exception('Can not create a new questionnaire.');
        }
    }

    public function changeQuestionnaire($_id_topic, $_id_question, $_question, $_answers)
    {
        $row = $this->find($_id_topic, $_id_question)->current();
        if($row)
        {
            $row->id_topic = $_id_topic;
            $row->id_question = $_id_question;
            $row->question = $_question;
            $row->answers = $_answers;
            $row->save();
            return $row;
        }
        else
        {
            throw new Zend_Exception('Can not find the required questionnaire.');
        }
    }

    public function deleteQuestionnaire($_id_topic, $_id_question)
    {
        $questionnaire = $this->find($_id_topic, $_id_question)->current();
        if($questionnaire)
        {
            $questionnaire->delete();
        }
        else
        {
            throw new Zend_Exception('Can not find the required questionnaire.');
        }
    }
}
?>