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
class MemberController extends YController {

    public function __construct() {
        session_start();
    }

    public function actionIndex($queryString) {
        $this->render('HomeView', 'LoginLayout', null);
    }

    public function loginAction($queryString) {
        //  foreach ($_POST as $key => $value) {
        //     echo $key . '= ' . $value . '<BR>';
        //}

        if (array_key_exists("login", $_POST)) {
            //get form data
            $username = addslashes(strip_tags($_POST['username']));
            $password = addslashes(strip_tags($_POST['password']));
            // $ret = $user->insert();

            $user = new UserModel();
            $user->loadByName($username);

            if ($user->name == null) {
                $this->render('HomeView', 'RegisterLayout', null);
                return;
            }

            //get database password
            $password_db = $user->password;
            //encrypt form password
            $password = md5($password);

            //check password
            if ($password != $password_db) {
                echo 'login failed';
                $this->render('HomeView', 'LoginLayout', array('username' => $user->name));
            } else {
                $_SESSION['user'] = $user->name;
                $this->render('HomeView', 'MainLayout', array('username' => $user->name));
            }
        } else {
            $this->render('HomeView', 'LoginLayout', null);
        }
    }

    public function registerAction($queryString) {
        if (array_key_exists("reg", $_POST)) {
            $user = new UserModel();
            $user->setVariable($_POST);

            $ret = $user->insert();

            if ($ret == false) {
                echo 'register failed';
                YHelper::error404();
            } else {
                $this->render('HomeView', 'MainLayout', array('username' => $user->name));
            }
        } else {
            $this->render('HomeView', 'RegisterLayout', null);
        }
    }

    public function checkUsernameAction($queryString) {
        if (array_key_exists("username", $_GET)) {
            $username = addslashes(strip_tags($_GET['username']));
            $user = new UserModel();
            $user->loadByName($username);

            if ($user->name == null) {
                echo "<img src='" . YHtml::imgURL('check_right.gif') . "'/>";
                echo "<font color='#aaaaaa'>OK</font>";
            } else {
                echo "<img src='" . YHtml::imgURL('check_error.gif') . "'/>";
                echo "<font color='#aaaaaa'>EXIST</font>";
            }
        }
    }

    public function checkEmailAction($queryString) {
        if (array_key_exists("email", $_GET)) {
            $username = addslashes(strip_tags($_GET['email']));
            $user = new UserModel();
            $user->loadByEmail($username);

            if ($user->email == null) {
                echo "<img src='" . YHtml::imgURL('check_right.gif') . "'/>";
                echo "<font color='#aaaaaa'>OK</font>";
            } else {
                echo "<img src='" . YHtml::imgURL('check_error.gif') . "'/>";
                echo "<font color='#aaaaaa'>EXIST</font>";
            }
        }
    }

}

?>
