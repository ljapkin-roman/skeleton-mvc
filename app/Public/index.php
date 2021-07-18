<?php
require '../../vendor/autoload.php';
use App\Core\Router;
use App\Core\Application;
$app = new Application();
$app->router->get('/user', function(){
    echo "method get from router";
});
$app->run();

