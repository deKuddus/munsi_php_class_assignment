<?php

namespace App\Controller;

class Controller
{
    public function __call($name, $params){
        return "Undefined method called : {$name}";
    }


    public function __get($name){
        return "Undefined property called : {$name}";
    }


}