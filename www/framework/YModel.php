<?php
class YModel{
    protected $db;
    protected $tableName;
    public $tableMap;
    function __construct() {
        $this->db = YBootstrap::getApplication()->getDb();
    }
    function insert(){
        if (!is_null($this->db) && $this->db->isReady()){
            $query = $this->getInsertQuery($this->tableMap);
            return $this->db->query($query);
        }
        return null;
        
        
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
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
