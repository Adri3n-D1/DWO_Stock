<?php

class MainController{

    public function estateListAction(){

        $this->render('estate-list');

    }

    public function render($view, $args = []){

        extract($args, EXTR_SKIP);

        $file = ROOT .  "view".DIRECTORY_SEPARATOR."layout.php";

        require_once($file);
    }

}