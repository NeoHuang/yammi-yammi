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
    public $dbName;
    public $preparedQuery;
    public $lastQuery = '';
    public $numQueries = 0;
    public $lastError;
    public $result;
    public $rowsAffected = 0;
    public $insertId = -1;
    public $lastResult;
    public $numRows;
    protected $dbObj;
    protected $ready = false;

    public function __construct($host, $username, $password, $dbName) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;
    }

    public function isReady() {
        return $this->ready;
    }

    public function connect() {
        $this->dbObj = new mysqli($this->host, $this->username, $this->password, $this->dbName);
        if (!$this->dbObj->connect_errno) {
            $this->ready = true;
        }
    }

    function weakEscape($string) {
        return addslashes($string);
    }

    function escape($string) {
        if ($this->ready) {
            return $this->dbObj->real_escape_string($this->dbObj, $string);
        } else {
            return weakEscape($string);
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

    function flush() {
        $this->lastResult = array();
        $this->lastQuery = null;
        $this->insertId = -1;
        if (is_resource($this->result))
            mysql_free_result($this->result);
    }

    function query($query = null) {

        if (!$this->ready)
            return false;
        if (!isset($query)) {
            $query = $this->preparedQuery;
        }
        $return_val = 0;
        flush();
        $this->last_query = $query;
        //echo $query;
        //echo "<BR>";
        if (Config::$develop_environment) {
            $this->result = $this->dbObj->query($query);
        } else {
            $this->result = @$this->dbObj->query($query);
        }
        $this->numQueries++;


        // If there is an error then take note of it..
        if ($this->lastError = $this->dbObj->error) {
            return false;
        }

        if (preg_match('/^\s*(create|alter|truncate|drop)\s/i', $query)) {
            $return_val = $this->result;
        } elseif (preg_match('/^\s*(insert|delete|update|replace)\s/i', $query)) {

            $this->rowsAffected = $this->dbObj->affected_rows;
            if (preg_match('/^\s*(insert|replace)\s/i', $query)) {
                $this->insertId = $this->dbObj->insert_id;
            }
            $return_val = $this->rowsAffected;
        } else {
            $num_rows = 0;
            while ($row = $this->result->fetch_object()) {
                $this->lastResult[$num_rows] = $row;
                $num_rows++;
            }
            $this->numRows = $num_rows;
            $return_val = $num_rows;
        }
        return $return_val;
    }

    function prepareInsertQuery($table, $data) {
        $query = 'INSERT INTO ' . $table . ' ';
        $columns = '';
        $values = '';
        foreach ($data as $key => $value) {
            if (!is_null($value)) {
                $columns .= "$key,";
                $values .= "'$value',";
            }
        }
        $columns = substr($columns, 0, -1);
        $values = substr($values, 0, -1);
        $query .= "($columns) VALUES ($values)";
        $this->preparedQuery = $query;
        return $query;
    }

    function prepareLoadOne($table, $whereData) {
        $query = 'SELECT * FROM ' . $table . $this->where($whereData);
        $this->preparedQuery = $query;
        return $query;
    }

    function where($whereData) {

        if (is_array($whereData)) {
            $query = " WHERE ";
            $numItems = count($whereData);
            $i = 0;
            foreach ($whereData as $key => $value) {
                $query .= "$key='$value'";
                if (++$i !== $numItems) {
                    $query .= " AND ";
                }
            }

            return $query;
        }
        return '';
    }

}

?>
