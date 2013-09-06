<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RestaurantModel
 *
 * @author zhiyih
 */
class RestaurantModel extends YModel{
    //put your code here
    

    
    function __construct() {
        parent::__construct();
        $this->tableName = 'restaurants';
        $this->tableMap = array('id' => 'rest_id',
                                'name' => 'rest_name',
                                'parent' => 'rest_parentRstr',
                                'cityId' => 'rest_city_id',
                                'street' => 'rest_street',
                                'coordinate' => 'rest_coordinate',
                                'zipCode' => 'rest_zipCode',
                                'phone' => 'rest_phone',
                                'website' => 'rest_website',
                                'description' => 'rest_description',
                                'extra' => 'rest_extra');
        $this->initVariable();
        $this->hasOne = array('City' => array('rest_id' => 'city_ID'));
        $this->hasMore = array('Dish' => array('rest_id' => 'rest_ID'));
    }
}
?>
