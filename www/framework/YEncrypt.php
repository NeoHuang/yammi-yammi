<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YEncrypt
 *
 * @author root
 */
class YEncrypt {

    //put your code here
    static function encrypt($string) {
        return md5($string);
    }

}

?>
