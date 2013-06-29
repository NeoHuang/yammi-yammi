<?php
require_once (ROOT . DS . 'configs' . DS . 'Config.php');
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
setReporting();

function __autoload($className) {
    if (file_exists(ROOT . DS . 'configs' . DS . $className . '.php')){
        require_once(ROOT . DS . 'configs' . DS . $className . '.php');
    }else
    if (file_exists(ROOT . DS . 'framework' . DS . $className . '.php')){
        require_once(ROOT . DS . 'framework' . DS . $className . '.php');
    }else{
        if (file_exists(ROOT . DS . Config::$application_folder . DS . 'controllers' . DS . $className . '.php')) {
            require_once(ROOT . DS . Config::$application_folder . DS . 'controllers' . DS . $className . '.php');
        } else if (file_exists(ROOT . DS . Config::$application_folder . DS . 'models' . DS . $className . '.php')) {
            require_once(ROOT . DS . Config::$application_folder . DS . 'models' . DS . $className . '.php');
        } else {         
            YHelper::internalError($className. ' Not Found');   
            
        }
        
    }
    
    
}
class YBootstrap{
    static protected $app;
    static function getApplication(){
        if (self::$app == null){
            self::$app = YFactory::createApp();
        }
        return self::$app;
    }
    
    
}
YBootstrap::getApplication()->run();


