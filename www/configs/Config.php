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

    static $develop_environment = true;
    //static $domain = 'http://localhost/git/yammi-yammi/www';
    static $domain = 'http://localhost:8080/';
    static $application_folder = 'application';
    static $view_folder = 'application/views';
    static $media_server = '';
    static $css_folder = 'application/css';
    static $js_folder = 'application/js';
    static $img_folder = 'application/img';
    //DB settings
    static $db_host = 'localhost';
    static $db_user = 'root';
    static $db_password = '';
    static $db_name = 'yammi_yammi_com';
    static $table_prefix = 'yy_';

}

?>
