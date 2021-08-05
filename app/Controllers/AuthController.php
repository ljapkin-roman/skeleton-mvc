<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Core\Request;

class AuthController extends Controller
{
     public function login(Request $request)
     {
         if ($request->isPost())
         {
             print_r($_POST);
         }
         return $this->render('login');
     }

     public function register(Request $request)
     {
         if ($request->isPost())
         {
             return 'handle submitted data';
         }
         return $this->render('register');
     }
}