<?php

include_once('C:/xampp/htdocs/quizztdd/config/config.php');

class Controller {
    
    public function render($sFilepath, $aParameters = [])
    {
        extract($aParameters);
        ob_start();
        require ROOT . $sFilepath;
        ob_end_flush();
    }
}
