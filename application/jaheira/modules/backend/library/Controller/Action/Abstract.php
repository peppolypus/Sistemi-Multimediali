<?php
abstract class Backend_Library_Controller_Action_Abstract
    extends Custom_Controller_Action_Abstract
{
    public function init()
    {
        $this->_initView();
        // Altre impostazioni per il layout
        
    }

    public function preDispatch()
    {
        if($this->_request->isXmlHttpRequest() || isset($_GET['ajax']))
        {
            Zend_Controller_Action_HelperBroker::removeHelper('Layout');
        }

        if(!$this->getRequest()->isXmlHttpRequest())
        {
            $messages = array();
            $messages['error'] = $this->_helper->FlashMessenger->setNamespace('error')->getMessages();
            $messages['success'] = $this->_helper->FlashMessenger->setNamespace('success')->getMessages();
            $this->view->messages = $messages;
        }
    }

    protected function _initView()
    {
        $view = new Custom_Controller_Action_Helper_View($this->view);
        $this->view = $view->init();
        // Imposto il Titolo
        $this->view->headTitle('Amministrazione');
        $this->view->headTitle()->setSeparator(' - ');
        // Aggiungo gli script javascript
        $this->view->headScript()->prependFile('/library/js/jquery.min.js');
        $this->view->headScript()->appendFile('/library/js/dropdown.js');
        $this->view->headScript()->appendFile('/library/js/colorplugin.js');
        // Aggiungo i link css
        $this->view->headLink()->prependStylesheet('/library/css/reset.css');
        $this->view->headLink()->appendStylesheet('/library/css/fontface.css');
        $this->view->headLink()->appendStylesheet('/library/css/typo.css');
        $this->view->headLink()->appendStylesheet('/library/css/admin.css');        
    }
}
