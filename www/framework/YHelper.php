<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YHelper
 *
 * @author root
 */
class YHelper {
    //put your code here
    static function redirect($url){
        header( 'Location: '.$url ) ;

    }
    static function error404(){
        
        YBootstrap::getApplication()->softRedirect('ErrorController', 'actionIndex', array(''));
    }
    static function internalError($msg){
       if (Config::$develop_environment){
           echo $msg;
           die();
        }
        else 
            self::redirect('error');
    }
}

?>
