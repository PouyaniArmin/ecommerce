<?php

use Conterollers\ProductConterller;
use Core\Application;

require_once __DIR__."/../vendor/autoload.php";

$app=new Application(dirname(__DIR__));
$app->router->get('/','home');

$app->router->get('/contact',function(){
    return Application::$app->router->renderView('contactus');
});

$app->router->get('/product',[ProductConterller::class,'index']);

$app->run();