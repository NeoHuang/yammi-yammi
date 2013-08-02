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
        $this->tableMap = array('id' => 'user_id',
                                'name' => 'user_name',
                                'password' => 'user_password',
                                'nick' => 'user_nickname',
                                'email'=> 'user_email',
                                'register' => 'user_registered',
                                'activationKey'=>'user_activation_key',
                                'typeId'=>'user_type_id',
                                'status'=>'user_status');
        $this->initVariable();
    }
    
}

?>
