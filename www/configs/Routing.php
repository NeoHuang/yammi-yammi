<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Routing
 *
 * @author root
 */
class Routing {

    static public $controllers = array(
        '' => 'HomeController',
        'Member' => 'MemberController'
    );
    static public $actions = array(
        '' => 'actionIndex',
        'Login' => 'loginAction',
        'Register' => 'registerAction',
        'CheckUserName' => 'checkUsernameAction',
        'CheckEmail' => 'checkEmailAction'
    );

}

?>
