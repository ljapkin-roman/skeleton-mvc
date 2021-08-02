<?php
namespace App\Core;
use App\Core\Router;
use App\Core\Request;
use App\Core\Response;
class Application {
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public function __construct($root_path)
    {
        self::$ROOT_DIR = $root_path;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        self::$app = $this;
    }
    public function run() {
        echo $this->router->resolve();
    }

}