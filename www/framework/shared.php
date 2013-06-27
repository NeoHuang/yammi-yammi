<?php

function setReporting() {
    if (Config::$develop_environment == true) {
        error_reporting(E_ALL);
        ini_set('display_errors','On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors','Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
    }
}

function __autoload($className) {
    if (file_exists(ROOT . DS . 'libs' . DS . $className . '.class.php')) {
        require_once(ROOT . DS . 'libs' . DS . strtolower($className) . '.class.php');
    } else if (file_exists(ROOT . DS . Config::$application_folder . DS . 'controllers' . DS . $className . '.php')) {
        require_once(ROOT . DS . Config::$application_folder . DS . 'controllers' . DS . $className . '.php');
    } else if (file_exists(ROOT . DS . Config::$application_folder . DS . 'models' . DS . $className . '.php')) {
        require_once(ROOT . DS . Config::$application_folder . DS . 'models' . DS . $className . '.php');
    } else {
        if (Config::$develop_environment == true)
            die ("class $className not found in " . __FILE__);
        else{
            //TODO;
        }
            
    }
}
function callHook() {
    global $url;
    $urlArray = array();
    $urlArray = explode("/",$url);
    if (sizeof($urlArray) >= 2){
        $controller = $urlArray[0];
        array_shift($urlArray);
        $action = $urlArray[0];
        array_shift($urlArray);
        $queryString = $urlArray;

        $controllerName = $controller;
        $controller = ucwords($controller);
        $model = rtrim($controller, 's');
        $controller .= 'Controller';
        
        $dispatch = new $controller($model,$controllerName,$action);

        if ((int)method_exists($controller, $action)) {
            call_user_func_array(array($dispatch,$action),$queryString);
        } else {
            /* Error Generation Code Here */
        }

    }
    
    
}

setReporting();
if (isset($_GET['url']))
{
    $url = $_GET['url'];
}
else{
   $url = '';
}
callHook();
//$url = $_GET['url'];
//echo $url;
