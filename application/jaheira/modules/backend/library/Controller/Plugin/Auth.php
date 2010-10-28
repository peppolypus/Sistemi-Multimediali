<?php
class Backend_Library_Controller_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{
    protected $_auth;

    public function __construct(Zend_Auth $auth)
    {
        $this->_auth = $auth;
    }

    public function  dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
        // Se l'utente non è loggato
        if(!$this->_auth->hasIdentity())
        {
            return $this->_redirect($request, 'users', 'login', 'backend');
        }

        // L'utente è loggato
        // Controlla che l'utente non acceda alla pagina di login
        if('backend' == $request->getModuleName()
                && 'users' == $request->getControllerName()
                && 'login' == $request->getActionName())
        {
            return $this->_redirect($request, 'index', 'index', 'backend');
        }
    }

    protected function _redirect($request, $controller, $action, $module)
    {
        if($request->getControllerName() == $controller
                && $request->getActionName() == $action
                && $request->getModuleName() == $module)
        {
            return true;
        }

        $url = Zend_Controller_Front::getInstance()->getBaseUrl();
        $url .= '/' . $module . '/' . $controller . '/' . $action;

        return $this->_response->setRedirect($url);
    }
}