<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author root
 */
class HomeController extends YController {

    public function __construct() {
        session_start();
    }

    public function actionIndex($queryString) {

        $this->render('HomeView', 'MainLayout', array('test' => null));
    }

}

?>
