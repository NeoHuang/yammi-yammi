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
       /* echo 'Hello World ';
        if (is_array($queryString)){
            $count = count($queryString);
           
            for ($i = 0; $i < $count; $i++) 
            
                echo $queryString[$i] . ' ';
           
        }
        else {
            echo $queryString;
        }*/
        $this->render('HomeView', 'MainLayout');
		
    }
    
}

?>
