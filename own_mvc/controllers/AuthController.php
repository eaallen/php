<?php
namespace app\controllers;
use app\core\Controller;
use app\core\Request;

/**
 * @author Elijah Allen
 * @package app\controllers
 */

class AuthController extends Controller{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $this->setLayout('auth');
        if($request->isPost()){ // request is POST
            return 'handle submitted data';
        }
        // request is GET
        return $this->render('register');
    }

}