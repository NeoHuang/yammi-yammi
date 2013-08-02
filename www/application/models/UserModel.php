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
    public $uid;
    public $name;
    public $password;
    public $nick;
    public $email;
    public $registeredDateTime;
    public $activationKey;
    public $type;
    public $status;
    

    
    function __construct() {
        parent::__construct();
        $this->tableName = 'users';
        $this->tableMap = array('user_id' => &$this->uid,
                             'user_name' => &$this->name,
                             'user_password' => &$this->password);
    }
    
}

?>
