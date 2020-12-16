<?php

namespace app\core;
/**
 * class Router
 * @author elijah
 * @package app\core 
 */


class Application{
    public Router $router;
    function __contruct()
    {
        $this->router = new Router();
        # code...
    }

    public function run()
    {
        $this->router->resolve()
    }

    public function setConfig($config)
    {
        # code..
    }

    public function setRouter($router)
    {
        # code...
    }
}