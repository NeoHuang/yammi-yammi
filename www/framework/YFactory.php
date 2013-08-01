<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YFactory
 *
 * @author root
 */
class YFactory {
    static function createApp($url){
        return new YApplication($url);
    }
    static function createDb($db_host, $db_user, $db_password, $db_Name){
        $db = new YDbConnection($db_host, $db_user, $db_password, $db_Name);
        $db->connect();
        return $db;
    }
}

?>
