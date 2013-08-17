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
        $this->render('HomeView', 'LoginLayout');
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
                echo 'login failed';
                $this->render('HomeView', 'LoginLayout');
                return;
            }

            //get database password
            $password_db = $user->password;
            //encrypt form password
            $password = md5($password);

            //check password
            if ($password != $password_db) {
                echo 'login failed';
                $this->render('HomeView', 'LoginLayout');
            } else {
                $_SESSION['user'] = $user->name;
                // setcookie("user", $user->name, time() + 3600);
                //$this->render('HomeView', 'MainLayout');

                $url = Config::$domain;
                echo "<script type='text/javascript'>";
                echo "window.location.href='$url'";
                echo "</script>";
            }
        } else {
            $this->render('HomeView', 'LoginLayout');
        }
    }

    public function logoutAction($queryString) {
        session_unset();

        $url = Config::$domain;
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }

    public function registerAction($queryString) {
        if (array_key_exists("reg", $_POST)) {

            if ($_POST['validName'] == 'false' || $_POST['validEmail'] == 'false' || $_POST['validPassword'] == 'false' || $_POST['validRePassword'] == 'false' || $_POST['name'] == '' || $_POST['email'] == '' || $_POST['password'] == '' || $_POST['repassword'] == '') {
                echo 'check input!';
                $this->render('HomeView', 'RegisterLayout');
                return;
            }

            $user = new UserModel();
            $user->setVariable($_POST);

            $ret = $user->insert();

            if ($ret == false) {
                echo 'register failed';
                YHelper::error404();
            } else {
                $_SESSION['user'] = $user->name;
                // setcookie("user", $user->name, time() + 3600);

                $url = Config::$domain;
                echo "<script type='text/javascript'>";
                echo "window.location.href='$url'";
                echo "</script>";
            }
        } else {
            $this->render('HomeView', 'RegisterLayout');
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
