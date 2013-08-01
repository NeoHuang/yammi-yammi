<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of config
 *
 * @author root
 */
class Config {
    
    static $develop_environment     = true;
    static $domain                  = 'http://localhost:8080/';
    static $application_folder      = 'application';
    static $view_folder             = 'application/views';
    static $media_server            = 'http://localhost:8080/';
    static $css_folder              = 'application/css';
    
    //DB settings
    static $db_host                 = 'localhost';
    static $db_user                 = 'root';
    static $db_password             = 'i23456';
    static $db_name                 = 'test';
}

?>
