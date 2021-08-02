<?php
require '../../vendor/autoload.php';
use App\Core\Router;
use App\Core\Application;
use App\Controllers\SiteController;
use App\Controllers\AuthController;
$app = new Application(dirname(__DIR__));
$app->router->get('/user', function(){
    echo "method get from router";
});
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/home', [SiteController::class, 'home']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->run();



