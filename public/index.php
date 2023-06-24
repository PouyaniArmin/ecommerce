<?php

use Conterollers\ContactController;
use Conterollers\HomeController;
use Conterollers\ProductConterller;
use Core\Application;
use Dotenv\Dotenv;

require_once __DIR__."/../vendor/autoload.php";
$app=new Application(dirname(__DIR__));

$app->router->get('/',[HomeController::class,'index']);
$app->router->get('/contact',[ContactController::class,'index']);
$app->router->post('/contact',[ContactController::class,'index']);
$app->router->get('/product',[ProductConterller::class,'index']);

$app->run();