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
        $found = false;
        foreach (Config::$auto_folders as $subfolder){
             if (file_exists(ROOT . DS . Config::$application_folder . DS . $subfolder . DS . $className . '.php')){
                 $found = true;
                 require_once(ROOT . DS . Config::$application_folder . DS . $subfolder . DS . $className . '.php');
                 break;
             }
        }
        if (!$found) {         
            YHelper::internalError($className. ' Not Found');   
            
        }
        
    }
    
    
}
class YBootstrap{
    static protected $app;
    static function getApplication(){
        if (self::$app == null){
            $url = '';
            if (isset($_GET['url']))
            {
                $url = $_GET['url'];
            }
            self::$app = YFactory::createApp($url);
        }
        return self::$app;
    }
    
    
}
YBootstrap::getApplication()->run();


