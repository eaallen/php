<?php

namespace app\controllers;

use app\core\Application;

/**
 * @author Elijah Allen
 * @package app\controllers
 * 
 */

class SiteController
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
        return Application::$app->router->renderView('contact');
    }
    public function handleContact()
    {
        return 'Hanldeing data';
    }
}
