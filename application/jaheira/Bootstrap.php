<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initConfig()
    {
        Zend_Registry::set('config', new Zend_Config($this->getOptions()));
    }

    protected function _initDate()
    {
        date_default_timezone_set(Zend_Registry::get('config')->settings->application->datetime);
    }

    protected function _initDatabase()
    {
        $this->bootstrap('multidb');
        $resource = $this->getPluginResource('multidb');
        $databases = Zend_Registry::get('config')->resources->multidb;
        foreach($databases as $name => $adapter)
        {
            $db_adapter = $resource->getDb($name);
            Zend_Registry::set($name, $db_adapter);
        }
    }
}
