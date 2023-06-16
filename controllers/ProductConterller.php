<?php 

namespace Conterollers;

use Core\Application;
use Core\Controller;

class ProductConterller extends Controller{
    public function index(){
        $body=['name'=>'armin','age'=>29];
        return $this->view('product',$body);
    }
}