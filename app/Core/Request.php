<?php


namespace App\Core;


class Request
{
    public $path;
    public $method;
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false ) {
            return $path;
        }
        return  substr($path, 0, $position);
    }

    public function  getMethod()
    {
       $this->method = strtolower($_SERVER['REQUEST_METHOD']) ?? false;
       return $this->method;
    }
}