<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author root
 */
class UserModel extends YModel{
    //put your code here
    

    
    function __construct() {
        parent::__construct();
        $this->tableName = 'users';
        $this->tableMap = array('uid' => 'user_id',
                                'name' => 'user_name',
                                'password' => 'user_password',
                                'nick' => 'user_nick',
                                'email'=> 'user_email',
                                'register' => 'user_registered');
        $this->initVariable();
    }
    
}

?>
