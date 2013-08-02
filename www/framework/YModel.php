<?php
class YModel{
    protected $db;
    protected $tableName;
    public $tableMap;
    function __construct() {
        $this->db = YBootstrap::getApplication()->getDb();
    }
    function insert(){
        if (!is_null($this->db) && $this->db->isReady() && $this->checkForInsert()){
            $queryTable = array();
            foreach ($this->tableMap as $m=>$f){
                $queryTable[$f] = $this->$m;
            }
            $query = $this->getInsertQuery($queryTable);
            return $this->db->query($query);
        }
        return null;      
    }
    function find($data){
       // $query = 'SELECT * FROM'. Config::$table_prefix . $this->tableName . ' '
    }
    function initVariable(){
        foreach($this->tableMap as $m=>$f){
            $this->$m = null;
        }
    }
    function getInsertQuery($data){
        $query = 'INSERT INTO ' . Config::$table_prefix . $this->tableName . ' ';
        $columns = '';
        $values = '';
        foreach ($data as $key => $value) {
            if (!is_null($value)){
                $columns .= "$key,";
                $values  .= "'$value',";
            }
           
        }
        $columns = substr($columns, 0, -1);
        $values = substr($values, 0, -1);
        $query .= "($columns) VALUES ($values)";
        return $query;
    }
    function checkForInsert(){
        return true;
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
