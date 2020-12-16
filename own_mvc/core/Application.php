<?php

// namespace app\core;
/**
 * class Router
 * @author ELijah Allen
 * @package app\core 
 */


class Application{
    public Router $router;
    function __contruct()
    {
        $this->router = new Router();
        # code...
    }

    public function setConfig($config)
    {
        # code...
    }

    public function setRouter($router)
    {
        # code...
    }
}