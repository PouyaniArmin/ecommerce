<?php 
namespace Core;

class Response{
    public function statusResponseCode(int $code){
        http_response_code($code);
    }
}