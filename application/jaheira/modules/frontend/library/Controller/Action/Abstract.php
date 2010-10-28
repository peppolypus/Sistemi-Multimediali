<?php
abstract class Frontend_Library_Controller_Action_Abstract
    extends Custom_Controller_Action_Abstract
{
    public function init()
    {
        $this->_initView();
        // Layout
        $layout = Zend_Layout::getMvcInstance();
        $layout->search = new Frontend_Form_Search();
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

        $script = 'var base_url = "' . $this->view->baseUrl() . '";';
        $this->view->headScript()->prependScript($script, $type = 'text/javascript', $attrs = array());
    }

    protected function _initView()
    {
        $view = new Custom_Controller_Action_Helper_View($this->view);
        $this->view = $view->init();
        // Imposto il Titolo
        $this->view->headTitle('YouProf');
        $this->view->headTitle()->setSeparator(' - ');
        // Aggiungo gli script javascript
        $this->view->headScript()->prependFile('/library/js/jquery.min.js');
        $this->view->headScript()->appendFile('/library/js/spotlight.js');
        $this->view->headScript()->appendFile('/library/js/colorplugin.js');
        // Aggiungo i link css
        $this->view->headLink()->prependStylesheet('/library/css/reset.css');
        $this->view->headLink()->appendStylesheet('/library/css/fontface.css');
        $this->view->headLink()->appendStylesheet('/library/css/typo.css');
        $this->view->headLink()->appendStylesheet('/library/css/layout.css');
    }
}
