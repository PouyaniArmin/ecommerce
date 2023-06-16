<?php 


namespace Core;

class Controller{
    public $layout='main';

    public function setlayout(string $layout){
        $this->layout=$layout;
    }

    public function view($view,$params=[]){
        return Application::$app->router->renderView($view,$params);
    }
}