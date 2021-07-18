<?php
namespace App\Core;
use App\Core\Request;
class Router
{
    public Request $request;
    protected array $routes = [];
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback) {
           $this->routes['get'][$path] = $callback;
    }

    public function renderView($view) {
        require_once __DIR__  . "/../Views/$view.php";
    }


    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            echo "Not found";
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        call_user_func($callback);

    }
}
