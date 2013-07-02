<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YApplication
 *
 * @author root
 */
class YApplication {
    protected $url;
    protected $controller;
    protected $actionName;
    function __construct($url) {
        $this->url = $url;
        require_once (ROOT. DS. 'language'. DS . 'lang_en.php');
        
    }

    function run(){
        $controllerName = '';
        $this->actionName = '';
        $queryString = array('');
        
        $urlArray = array();
        $urlArray = explode("/",$this->url);
        $controllerName = $urlArray[0];
        if ($controllerName == 'error'){
            echo Language::$MSG_404;
            return;
        }
        if (sizeof($urlArray) >= 2){               
            array_shift($urlArray);
            $this->actionName = $urlArray[0];
            array_shift($urlArray);
            $queryString = $urlArray;

        }
        $controllerName = strtolower($controllerName);
        if (array_key_exists($controllerName, Routing::$controllers)){
            $controllerName = Routing::$controllers[$controllerName];
        }
        else{
            $controllerName = ucwords($controllerName) . 'Controller';
        }
        if (array_key_exists($this->actionName, Routing::$actions)){
            $this->actionName = Routing::$actions[$this->actionName];
            
        }
        else
        {
           $this->actionName = 'action'. ucwords(strtolower($this->actionName));
        }
          
        $this->controller = new $controllerName($this->actionName);

        if ((int)method_exists($this->controller, $this->actionName)) {
            call_user_func_array(array($this->controller,$this->actionName),array($queryString));
        } else {
            YHelper::error404();
        }
    }
}

?>
