<?php 

namespace PHPMVC\LIB;

class FrontController 
{
    const NOT_FOUND_ACTION = 'notFoundAction';
    const NOT_FOUND_CONTROLLER = 'PHPMVC\CONTROLLERS\\NotfoundController';
    private $_controller = 'index';
    private $_action = 'default';
    private $_param = array();

    public function __construct()
    {
        $this->_parseUrl();
        
    }
    private function _parseUrl()
    {
        $url = explode(DS,trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),DS),3);
        if (isset($url[0]) && $url[0] != '') 
        {
            $this->_controller = $url[0];
        };
        if (isset($url[1])&& $url[1] != '') 
        {
            $this->_action = $url[1];
        };
        if (isset($url[2]) && $url[2] != '') {
            $this->_param =explode(DS,$url[2]);
        };
    }
    public function dispatch()
    {
        $controllerClassName= 'PHPMVC\CONTROLLERS\\' .ucfirst($this->_controller).'Controller';
        $actionName = $this->_action .'Action';

        if(!class_exists($controllerClassName))
        {
            $controllerClassName= self::NOT_FOUND_CONTROLLER;
        }
        $controllers = new $controllerClassName();
        if(!method_exists($controllers , $actionName))
        {
            $this->_action = $actionName = self::NOT_FOUND_ACTION;
        }
        $controllers->setController($this->_controller);
        $controllers->setAction($this->_action);
        $controllers->setParam($this->_param);
        $controllers->$actionName();
    }

}