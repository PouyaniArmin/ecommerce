<?php 

namespace Conterollers;

use Core\Controller;
use Core\Request;
use Database\DB;

class HomeController extends Controller{
    public function index(Request $request){
        $db=new DB;
        $db->table('users')->select();
        return $this->view('home');
    }
}