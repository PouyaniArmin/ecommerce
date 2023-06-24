<?php

namespace Core;

class Request extends Validation
{

    public function request_path()
    {
        $url = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos($url, "?");
        if ($position === false) {
            return $url;
        }
        return substr($url, 0, $position);
    }

    public function request_method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->request_method() === 'get';
    }

    public function isPost()
    {
        return $this->request_method() === 'post';
    }

    public function body()
    {
        $data = [];
        foreach ($_GET as $key => $value) {
            $data[$key] = $value;
        }
        foreach ($_POST as $key => $value) {
            $data[$key] = $value;
        }
        return $data;
    }


    protected function loadData(): array
    {
        return $this->body();
    }


    public function validation(bool $method ,array $rules){
        if ($method) {
            if ($this->validator($rules)) {
               return true;
            }   
        }
    }
}
