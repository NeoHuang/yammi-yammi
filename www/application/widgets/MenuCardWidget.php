<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuCardWidget
 *
 * @author zhiyih
 */
class MenuCardWidget extends YWidget {
    //put your code here
    protected $dish;
    public function __construct(DishModel $dish) {
        parent::__construct('MenuCardView');
        $this->dish = $dish;
    }
     public function prepareData($data){
        return array('name' => $this->dish->name,
                     'thumbnail' => $this->dish->thumbnail,
                     'description' => $this->dish->description,
                     'price' => Language::$PRICE . ': ' . $this->dish->price . ' €');
    }
}

?>
