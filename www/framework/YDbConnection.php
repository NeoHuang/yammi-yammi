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

    public function __construct($host, $username, $password, $dbName) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->name = $dbName;
    }

    public function isReady() {
        return $this->ready;
    }

    public function connect() {
        $this->dbh = mysqli_connect($this->host, $this->username, $this->password);
        if ($this->dbh && !is_null($this->dbh)) {
            if (mysqli_select_db($this->dbh, $this->name)) {
                $this->ready = true;
            }
        }
    }

    function weak_escape($string) {
        return addslashes($string);
    }

    function escape($string) {
        if ($this->dbh) {
            return mysqli_real_escape_string($string);
        } else {
            return weak_escape($string);
        }
    }

    function escapeData($data) {
        if (is_array($data)) {
            foreach ((array) $data as $k => $v) {
                if (is_array($v))
                    $data[$k] = $this->escapeData($v);
                else
                    $data[$k] = $this->escape($v);
            }
        } else {
            $data = $this->escape($data);
        }

        return $data;
    }

}

?>
