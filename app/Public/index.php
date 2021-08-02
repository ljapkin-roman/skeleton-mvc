<?php
require '../../vendor/autoload.php';
use App\Core\Router;
use App\Core\Application;
use App\Controllers\SiteController;
$app = new Application(dirname(__DIR__));
$app->router->get('/user', function(){
    echo "method get from router";
});
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/home', [SiteController::class, 'home']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'handlePost']);
app->router->get('/registration', [AuthController::class, 'login']);
$app->router->post('/registration', [AuthController::class, 'handlePost']);
$app->run();



