<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HeaderMenu
 *
 * @author zhiyih
 */
class ListItemWidget extends YWidget {
    protected $items;
    public function __construct($items = array(), $viewFile = '', $layout = null) {
        parent::__construct($viewFile, $layout);
        $this->items = $items;
    }
    public function addItem($name, $url){
        array_push($this->items, array($name => $url));
    }
    public function render($data = null, $return = false){
        echo "<ul>";
        foreach($this->items as $name => $url){
            
            echo "<li ";
            if (!empty($this->class)){
                echo "class=\"$this->class\""; 
            }
            echo "><a href=\"$url\">$name</a></li>"; 
            
        }
        echo "</ul>";
    }
}

?>
