<?php
namespace App\Core;
use App\Core\Request;
use App\Core\Response;
use App\Core\Application;
use App\Controllers\AuthController;
class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback) {
           $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['post'][$path] = $callback;
    }

    public function renderView($view, $params=[]) {

        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        //echo str_replace('{{content}}', $viewContent, $layoutContent);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent() {
        ob_start();
        include_once Application::$ROOT_DIR."/Views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params) {
        ob_start();
        include_once Application::$ROOT_DIR."/Views/$view.php";
        return ob_get_clean();
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return "Not found";
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if(is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
        return call_user_func($callback, $this->request);

    }
}
