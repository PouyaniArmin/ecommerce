<?php

namespace Core;

class Application{
    public static $ROOT_PARH;
    public static Application $app;
    public Router $router;
    public Request $request;
    public Controller $conteroller;
    
    public function __construct($root_path){
        self::$app=$this;
        self::$ROOT_PARH=$root_path;
        $this->request=new Request;
        $this->router=new Router($this->request);
    }

    public function getController():Controller{
      return $this->conteroller;
    }

    public function setController(Controller $controller){
      $this->conteroller=$controller;
    }

    public function run(){
      echo $this->router->resolve();
    }
}

?>