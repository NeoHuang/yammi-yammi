<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YController
 *
 * @author root
 */
abstract class YController {
    abstract public function actionIndex($queryString);

    public function render($mainWidget, $layout,  $data = array()){
        $view = new YWidget($mainWidget, $layout);
        $view->render($data);

    }
    public function runWidget($className, $data = null, $return){
        $widget = new $className();
    }
}

?>
