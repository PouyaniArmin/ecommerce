<?php

namespace Conterollers;

use Core\Controller;
use Core\Request;

class ContactController extends Controller
{

    public function index(Request $request)
    {
        $rules =
            [
                'name' => ['Required'],
                'email' => ['Required', 'Email'],
                'message' => ['Required'],
                'password' => ['Required', 'min'],
                'confirmPassword' => ['Required', 'match']
            ];

        if ($request->validation($request->isPost(), $rules)) {
            return $this->view('home');
        }
        return $this->view('contactus', $request->errors);
    }
}
