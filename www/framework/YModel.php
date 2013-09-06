<?php

class YModel {

    protected $db;
    protected $tableName;
    public $tableMap;
    protected $hasOne = null;
    protected $hasMore = null;
    protected $sqlBuilder;

    function getTableName() {
        return Config::$table_prefix . $this->tableName;
    }

    function __construct() {
        $this->db = YBootstrap::getApplication()->getDb();
        $this->sqlBuilder = new YSQLBuilder();
    }
    function getAlias(){
        $ret = array();
        $prefix = get_class($this) . '_';
        foreach ($tableMap as $mem=>$field){
            $ret[$field] = $prefix . $mem;
        }
        return $ret;
    }

    function insert() {
        if (!is_null($this->db) && $this->db->isReady() && $this->checkForInsert()) {
            $queryTable = array();
            foreach ($this->tableMap as $m => $f) {
                $queryTable[$f] = $this->$m;
            }
            $this->sqlBuilder->insert($this->getTableName(), $queryTable);
            return $this->db->query($this->sqlBuilder->getQuery());
        }
        return null;
    }

    function load($id) {
        if (!is_null($this->db) && $this->db->isReady()) {
            if (array_key_exists('id', $this->tableMap)) {
                $this->sqlBuilder->select()
                         ->from($this->getTableName())
                         ->where(array($this->tableMap['id'] => $id));
                $ret = $this->db->query($this->sqlBuilder->getQuery());
                if ($ret > 0) {
                    $obj = $this->db->lastResult[0];
                    foreach ($this->tableMap as $m => $f) {
                        $this->$m = $obj->$f;
                    }
                }
            }
        }
    }
    function selectAll(){
        $this->sqlBuilder->select()
                 ->from($this->getTableName());
        return $this->sqlBuilder;
    }
    function search(){  
        if (!is_null($this->db) && $this->db->isReady() && $this->sqlBuilder->isSelectQuery()){           
            $ret = $this->db->query($this->sqlBuilder->getQuery());
            $result = array();
            if ($ret > 0){              
                $i = 0;
                foreach($this->db->lastResult as $row){
                    $className = get_class($this);
                    $result[$i] = new $className();
                     foreach ($this->tableMap as $m => $f) {
                            $result[$i]->$m = $row->$f;
                        }
                    $i++;
                }
                return $result;
            }
            
        }
        else{
            return null;
        }
    }
    function initVariable() {
        foreach ($this->tableMap as $m => $f) {
            $this->$m = null;
        }
    }

    function setVariable($varArray) {
        foreach ($this->tableMap as $m => $f) {
            if (array_key_exists($m, $varArray))
                $this->$m = $varArray[$m];
        }
    }

    function checkForInsert() {
        return true;
    }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
