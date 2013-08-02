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
    protected $root;
    static protected $db;
    function __construct($url) {
        $this->url = $url;
        $this->root = ROOT;
        require_once (ROOT. DS. 'language'. DS . 'lang_en.php');
        
    }
    function getDb(){
        if (self::$db == null){
            
            self::$db = YFactory::createDb(Config::$db_host, Config::$db_user, Config::$db_password, Config::$db_name);
        }
        return self::$db;
    }
    function run(){
        $controllerName = '';
        $actionName = '';
        $queryString = array('');
        
        $urlArray = array();
        $urlArray = explode("/",$this->url);
        $controllerName = $urlArray[0];
  
        if (sizeof($urlArray) >= 2){               
            array_shift($urlArray);
            $actionName = $urlArray[0];
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
        if (array_key_exists($actionName, Routing::$actions)){
            $actionName = Routing::$actions[$actionName];
            
        }
        else
        {
           $actionName = 'action'. ucwords(strtolower($actionName));
        }
        $this->execute($controllerName, $actionName, array($queryString));  
        
    }
    function execute($controlName, $actionName, $queryString){
        
        $this->controller = new $controlName($actionName);
        $this->actionName = $actionName;
        if ((int)method_exists($this->controller, $actionName)) {
            call_user_func_array(array($this->controller,$actionName),$queryString);
        } else {
            YHelper::error404();
        }
    }
    function softRedirect($controlName, $actionName, $queryString){
        $this->execute($controlName, $actionName, $queryString);
    }
    function getFullPath($relativePath){
        return $this->root . DS . Config::$application_folder . DS . $relativePath;
    }
    function getViewPath($viewRelPath){
        return $this->root . DS . Config::$view_folder . DS . $viewRelPath . '.php';
    }
}

?>
