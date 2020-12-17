<?php

// class for routing 
namespace app\core;
/**
 * class Router
 * @author elijah
 * @package app\core 
 */

class Router {
    public Request $request;
    protected array $routes = [];


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public static function test()
    {
        echo('hello');
        exit;
    }

    public function get($path,$callback)
    {
       $this->routes['get'][$path] = $callback;
    }

    public function post($path,$callback)
    {
       $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;  
        if($callback===false){
            echo "Not Found :(";
            exit;
        }
        echo call_user_func($callback);
        echo "<br>method<br>";
        var_dump($path);
        // echo "<pre>";
        // var_dump($_SERVER);
        // echo "</pre>";
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