<?php
class Backend_Library_Form extends Zend_Form
{
    public function isValid($data) {
        if(!parent::isValid($data))
        {
            foreach($this->getElements() as $element)
            {
                if(!$element->isValid($element->getValue()))
                {
                    $classes = ($element->getAttrib('class') == "") ? "error" : $element->getAttrib('class') . " error";
                    $element->setAttrib('class', $classes);
                }
            }
            return false;
        }
        return true;
    }
}