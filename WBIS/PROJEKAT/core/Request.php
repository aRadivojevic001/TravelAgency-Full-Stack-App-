<?php

namespace app\core;

class Request
{
    public function path() {

        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if($position === false) {
            return $path;
        }

        return $path = substr($path, 0, $position);


    }

    public function method() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function all() : array {
       return $_REQUEST;
    }

    public function one($parametarName) {
        return $_REQUEST[$parametarName] ?? NULL;
    }



}