<?php
namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

/**
 * @author Elijah Allen
 * @package app\controllers
 */

class AuthController extends Controller{
    public function login()
    {
        $this->setLayout('auth'); // set the layout (template for the page)
        return $this->render('login'); // render the page
    }

    public function register(Request $request)
    {
        $this->setLayout('auth');
        if($request->isPost()){ // request is POST
            var_dump($request->getBody());
            $registerModel = new RegisterModel();
            return 'handle submitted data';
        }
        // request is GET
        return $this->render('register');
    }

}