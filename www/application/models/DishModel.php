<?php

class DishModel extends YModel{
    //put your code here
    

    
    function __construct() {
        parent::__construct();
        $this->tableName = 'dishes';
        $this->tableMap = array('id' => 'dish_id',
                                'name' => 'dish_name',
                                'thumbnail' => 'dish_thumbnail',
                                'price' => 'dish_price',
                                'description' => 'dish_description');
        $this->initVariable();
    }
    
}
?>
