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

    public function isGet() :?bool
    {
        return $this->getMethod() === 'get';
    }

    public function isPost() :?bool
    {
        return $this->getMethod() ==='post';
    }

    public function getBody()
    {
        $body = [];
        if ($this->getMethod() === 'get')
        {
            foreach ($_GET as $key => $value)
            {
                $body[$key] = filter_input(INPUT_GET, $value, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->getMethod() === 'post')
        {

            foreach ($_POST as $key => $value)
            {
                print_r(filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS));
                echo "\n";
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}