<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YFactory
 *
 * @author root
 */
class YFactory {
    static function createApp($url){
        return new YApplication($url);
    }
}

?>
