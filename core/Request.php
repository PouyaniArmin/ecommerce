<?php 

namespace Core;

class Request{

    public function request_path(){
        $url=$_SERVER['REQUEST_URI']?? '/';

        // $position=strpos($url,"?");
        // if ($position===false) {
        //     return $url;
        // }
        // return substr($url,0,$position);
    return $url;
    }

    public function request_method(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}