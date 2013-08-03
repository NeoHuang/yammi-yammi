<?php
class YModel{
    protected $db;
    protected $tableName;
    public $tableMap;
    function getTableName(){
        return Config::$table_prefix . $this->tableName;
    }
    function __construct() {
        $this->db = YBootstrap::getApplication()->getDb();
    }
    function insert(){
        if (!is_null($this->db) && $this->db->isReady() && $this->checkForInsert()){
            $queryTable = array();
            foreach ($this->tableMap as $m=>$f){
                $queryTable[$f] = $this->$m;
            }
            $this->db->prepareInsertQuery($this->getTableName(), $queryTable);
            return $this->db->query();
        }
        return null;      
    }
    function load($id){
        if (!is_null($this->db) && $this->db->isReady()){
            if (array_key_exists('id', $this->tableMap)){
            $this->db->prepareLoadOne($this->getTableName(), array($this->tableMap['id']=>$id));
            $ret = $this->db->query();
            if ($ret > 0){
                $obj = $this->db->lastResult[0];
                foreach($this->tableMap as $m=>$f){
                    $this->$m = $obj->$f;
                }
            }
            
            }
        }
        
        
    }
    function initVariable(){
        foreach($this->tableMap as $m=>$f){
            $this->$m = null;
        }
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
