<?php
namespace App\Controllers;
use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;

class SiteController extends Controller
{
    public function contact()
    {
        return Application::$app->router->renderView('contact');
    }

    public function home()
    {
        return Application::$app->router->renderView('home', $params);
    }

    public function gotLoginPost()
    {
        $params = ['name' => 'Roman'];
        return Application::$app->router->renderView('contact', $params);
    }

    public function login()
    {
        echo "<pre>";
        print_r(Application::$app->request->getBody());
        echo "</pre>";
        return $this->render('login');
    }

    public function handlePost(Request $request)
    {
        echo "<pre>";
        print_r($request->getBody());
        echo "</pre>";
        echo "Im handlePost";
    }

}