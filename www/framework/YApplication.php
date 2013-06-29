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
    function __construct() {
        if (isset($_GET['url']))
        {
            $this->url = $_GET['url'];
        }
        else{
           $this->url = '';
        }
        require_once (ROOT. DS. 'language'. DS . 'lang_en.php');
        
    }

    function run(){
        $controllerName = '';
        $actionName = '';
        $queryString = array();
        
        $urlArray = array();
        $urlArray = explode("/",$this->url);
        $controllerName = $urlArray[0];
        if ($controllerName == 'error'){
            echo Language::$MSG_404;
            return;
        }
        if (sizeof($urlArray) >= 2){               
            array_shift($urlArray);
            $actionName = $urlArray[0];
            array_shift($urlArray);
            $queryString = $urlArray;
        }
        $controllerName = strtolower($controllerName);
        if (array_key_exists($controllerName, Routing::$controller)){
            $controllerName = Routing::$controller[$controllerName];
        }
        else{
            $controllerName = ucwords($controllerName) . 'Controller';
        }
        
        $actionName = 'action'. ucwords(strtolower($actionName));
        $this->controller = new $controllerName($actionName);

        if ((int)method_exists($controller, $actionName)) {
            call_user_func_array(array($dispatch,$action),$queryString);
        } else {
            YHelper::error404();
        }
    }
}

?>
