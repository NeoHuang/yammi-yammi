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
class UserModel extends YModel {

    //put your code here



    function __construct() {
        parent::__construct();
        $this->tableName = 'users';
        $this->tableMap = array('id' => 'user_id',
            'name' => 'user_name',
            'password' => 'user_password',
            'nick' => 'user_nickname',
            'email' => 'user_email',
            'register' => 'user_registered',
            'activationKey' => 'user_activation_key',
            'typeId' => 'user_type_id',
            'status' => 'user_status');
        $this->initVariable();
    }

    function insert() {
        $this->password = YEncrypt::encrypt($this->password);
        return parent::insert();
    }

    function login($name, $password) {
        if (!is_null($this->db) && $this->db->isReady()) {
            if (array_key_exists('id', $this->tableMap)) {
                $this->db->prepareLoadOne($this->getTableName(), array($this->tableMap['id'] => $id));
                $ret = $this->db->query();
                if ($ret > 0) {
                    $obj = $this->db->lastResult[0];
                    foreach ($this->tableMap as $m => $f) {
                        $this->$m = $obj->$f;
                    }
                }
            }
        }
    }

    function loadByName($name) {
        if (!is_null($this->db) && $this->db->isReady()) {
            if (array_key_exists('name', $this->tableMap)) {
                $this->db->prepareLoadOne($this->getTableName(), array($this->tableMap['name'] => $name));
                $ret = $this->db->query();
                if ($ret > 0) {
                    $obj = $this->db->lastResult[0];
                    foreach ($this->tableMap as $m => $f) {
                        $this->$m = $obj->$f;
                    }
                }
            }
        }
    }

    function loadByEmail($email) {
        if (!is_null($this->db) && $this->db->isReady()) {
            if (array_key_exists('email', $this->tableMap)) {
                $this->db->prepareLoadOne($this->getTableName(), array($this->tableMap['email'] => $email));
                $ret = $this->db->query();
                if ($ret > 0) {
                    $obj = $this->db->lastResult[0];
                    foreach ($this->tableMap as $m => $f) {
                        $this->$m = $obj->$f;
                    }
                }
            }
        }
    }

}

?>
