<?php
class Backend_Bootstrap extends Zend_Application_Module_Bootstrap
{
    protected function _initLibraryAutoloader()
    {
        return $this->getResourceLoader()->addResourceType('library', 'library', 'library');
    }
    /*
    protected function _initAuthPlugin()
    {
        Zend_Controller_Front::getInstance()->registerPlugin(
                new Custom_Controller_Plugin_Auth(Zend_Auth::getInstance())
        );
    }*/
}
