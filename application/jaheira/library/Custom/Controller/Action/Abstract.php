<?php
abstract class Custom_Controller_Action_Abstract extends Zend_Controller_Action
{
    public function redirect($controller = 'index', $action = 'index', $module = 'frontend', $params = array(), $route = null, $reset = true)
    {
        $this->_redirect = $this->_helper->getHelper('Redirector');

        $current_controller = $this->_getParam('controller');
        $current_action = $this->_getParam('action');
        $current_module = $this->_getParam('module');

        if($current_controller == $controller && $current_action == $action && $current_module == $module)
        {
            return true;
        }

        if(strstr($controller, 'http'))
        {
            return $this->_redirect($controller, array('code' => 301));
        }

        if($route !== null)
        {
            $params = array_merge(array('action' => $action, 'controller' => $controller, 'module' => null),$params);
            return $this->_redirect->setCode(301)->setExit(true)->gotoRoute($params, $route, $reset);
        }

        return $this->_redirect->setCode(301)->setExit(true)->gotoSimpleAndExit($action, $controller, $module, $params);
    }
}