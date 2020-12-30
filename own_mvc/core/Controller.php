<?php
namespace app\core;
use app\core\Application;

/**
 * @author Elijah Allen
 * @package app\core
 */


class Controller
{
    public function render($view, $params=[])
    {
        return Application::$app->router->renderView($view, $params);
    }
}
