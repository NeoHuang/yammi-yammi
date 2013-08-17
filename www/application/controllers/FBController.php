<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MemberController
 *
 * @author root
 */
class FBController extends YController {

    public function __construct() {
        session_start();
    }

    public function actionIndex($queryString) {
        $this->render('HomeView', 'LoginLayout');
    }

    public function loginAction($queryString) {
        echo' <script src="//connect.facebook.net/en_US/all.js"></script>';
        echo'<fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button>';

        $this->render('HomeView', 'LoginLayout');
    }

}

?>
