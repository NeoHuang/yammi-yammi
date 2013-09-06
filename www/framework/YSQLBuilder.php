<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YSQLBuilder
 *
 * @author root
 */
class YSQLBuilder {
    protected $preparedQuery='';
    protected $hasWhere = false;
    function getQuery(){
        echo $this->preparedQuery;
        return $this->preparedQuery;
    }
    function flush(){
        $hasWhere = false;
    }
    function insert($table, $data){
        $this->flush();
        $query = 'INSERT INTO ' . $table . ' ';
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
        $this->preparedQuery = $query;
        return $this;
    }
    function select($columns = null){
        $this->flush();
        $this->preparedQuery = 'SELECT ';
        if (is_array($columns)){
            $columnString = $implode(', ', $columns);
            $this->preparedQuery .= $columnString;   
        }
        else{
            $this->preparedQuery .= '*';
        }
            
        
        return $this;
                
    }
    function selectAs($columns = null){
        $this->flush();
        $this->preparedQuery = 'SELECT ';
        if (!is_null($columns)){
            $n = count($columns);
            $i = 0;
            foreach ($columns as $field=>$alias){
                $this->preparedQuery .= "$field AS $alias" ;
                $i++;
                if ($i < $n){
                    $this->preparedQuery .= ', ';
                }
            }
        }
            
        return $this;
                
    }
    
    function from($tables){
        $this->preparedQuery .= ' FROM ';
        if (is_array($tables)){
            $this->preparedQuery .= implode(', ', $tables);
        }
        else{
             $this->preparedQuery .= $tables;
        }
        
       
        return $this;
        
    }
    function where($conditionPair, $operator = '=', $glue = 'AND'){
        
        if (is_array($conditionPair)){
            if (!$this->hasWhere){
                $this->preparedQuery .= " WHERE ";
                $this->hasWhere = true;
            }
            else {
                $this->preparedQuery .= " $glue ";
            }
            $conditions = array();
            $i = 0;
            foreach($conditionPair as $key=>$value){
                $conditions[$i] = $key. $operator. "'$value'";
                $i++;               
            }
            $this->preparedQuery .= implode(" $glue ", $conditions);
        }
        return $this;
    }
    function limit($num){
        $this->preparedQuery .= " LIMIT $num";
        return $this;
    }
    function limitRange($off, $num){
        $this->preparedQuery .= " LIMIT $off, $num";
        return $this;
    }
    function orderBy($order, $desc = false){
        $q = ' ORDER BY ';
        if (is_array($order)){
            $numItems = count($order);
            $i = 0;
            foreach ($order as $col ){
                $q .= $col;
                if(++$i !== $numItems) {
                    $q .= ', ';
                }
            }
        }
        else{
            $q .= $order;
        }
        if ($desc){
            $q .= ' DESC';
        }
        $this->preparedQuery .=$q;
        return $this;
    }
    function isSelectQuery(){
        if (preg_match('/^\s*(select)\s/i', $this->preparedQuery))
            return true;
        else
            return false;
    }
}

?>
