<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YDbConnection
 *
 * @author zhiyih
 */
class YDbConnection {
    public $host;
    public $username;
    public $password;
    public $name;
    protected $dbh;
    protected $ready = false;
    public function __construct($host, $username, $password, $dbName){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->name = $dbName;
    }
    public function isReady(){
        return $this->ready;
    }
    public function connect(){
        $this->dbh = mysqli_connect( $this->host, $this->username, $this->password);
        if ($this->dbh && !is_null($this->dbh)){
            if ( mysqli_select_db($this->dbh, $this->name) ) {
		$this->ready = true;		
            }               
        }
    }
} 

?>
