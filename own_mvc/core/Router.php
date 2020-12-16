<?php

// class for routing 
namespace app\core;
/**
 * class Router
 * @author elijah
 * @package app\core 
 */

class Router {
    protected array $routes = [];


    public function __construct()
    {
        
    }

    public static function test()
    {

    }

    public function get($path,$callback)
    {
       $this->routes['get'][$path] = $callback;
    }
    
    public function post($path,$callback)
    {
       $this->routes['post'][$path] = $callback;
    }

    private function httpsOrHttp()
    {
        if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
            $uri = 'https://';
        } else {
            $uri = 'http://';
        }
        return $uri .= $_SERVER['HTTP_HOST'];
    }
}