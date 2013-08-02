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

    public function actionIndex($queryString)
    {
        
        $db = YBootstrap::getApplication()->getDb();
        $user = new UserModel();
        $user->name = 'neohuang';
        $user->password = '123456';
        $ret = $user->insert();
        $this->render('HomeView', 'MainLayout', array('test'=>"userid = $ret"));
		
    }
    
}

?>
