<?php
require '../../vendor/autoload.php';
use App\Core\Router;
use App\Core\Application;
$app = new Application();
$app->router->get('/user', function(){
    echo "method get from router";
});
$app->router->get('/contact', 'contact');
$app->router->get('/home', 'home');
$app->run();

