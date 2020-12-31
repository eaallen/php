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
        $registerModel = new RegisterModel();
        if($request->isPost()){ // request is POST
            $registerModel->loadData($request->getBody());
            var_dump($registerModel);
            if($registerModel->validate() && $registerModel->register()){
                return 'success';
            }else{
                var_dump($registerModel->errors);
            }

            return $this->render('register',[
                'model'=>$registerModel
            ]);
        }
        // request is GET
        return $this->render('register',[
            'model'=>$registerModel
        ]);
}

}