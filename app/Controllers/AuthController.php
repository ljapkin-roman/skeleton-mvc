<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Core\Request;

class AuthController extends Controller
{
     public function login(Request $request)
     {
         if ($request->isGet())
         {
             return 'handle submitted data';
         }
         $this->render('register');
     }

     public function register(Request $request)
     {
         if ($request->isPost())
         {
             return 'handle submitted data';
         }
         $this->render('register');
     }
}