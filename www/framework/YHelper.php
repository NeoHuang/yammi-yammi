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
        
        echo "404 Not Found";
        die();
    }
    static function internalError($msg){
       if (Config::$develop_environment){
            die($msg);
        }
    }
}

?>
