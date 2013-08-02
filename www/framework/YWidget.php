<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YWidget
 *
 * @author root
 */
class YWidget {
    //put your code here
    public $class = '';
    public $id = '';
    public $viewFile = '';
    public $layout = null;
    public function __construct($viewFile = '', $layout = null) {
        $this->viewFile = $viewFile;
        if ($layout !== null){
                if (is_a($layout, 'YWidget')){
                $this->layout = $layout;
            }
            else if(is_string($layout)){
                $this->layout = new YWidget($layout);
            }       
        }
    }
    public function render($data = null, $return = false)
    {   
       
        $output = '';
        if ($this->layout !== null){ 
            $output = $this->renderInternal($data, true);    
            $output = $this->layout->render(array('content' => $output, ), true);     
        }
        else{
            
            $output = $this->renderInternal($data, true);
         
        }
        if ($return){
            return $output;
        }
        else{
            echo $output;
        }
        
    }
    protected function renderInternal($data = null, $return = false){
        $fullViewFile = YBootstrap::getApplication()->getViewPath($this->viewFile);
        if ($data !== null && is_array($data)){
            extract($data);
        }
        if (file_exists($fullViewFile)){
            if ($return){
                ob_start();
                ob_implicit_flush(false);
                require($fullViewFile);
                return ob_get_clean();
            }
            else {
                require($fullViewFile);
            }
            
        }
    }

}

?>
