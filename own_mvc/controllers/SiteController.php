<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

/**
 * @author Elijah Allen
 * @package app\controllers
 * 
 */

class SiteController extends Controller
{

    public function home()
    {
        $params = [
            'name'=>'Elijah Allen'
        ];
        return Application::$app->router->renderView('home',$params);
    }
    public function contact()
    {
        return $this->render('contact');
    }
    public function handleContact(Request $request)
    {
        $body = Application::$app->request->getBody();
        var_dump($body);
        return 'Hanldeing data';
    }
}
