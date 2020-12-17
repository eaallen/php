<?php

namespace app\core;
/**
 * 
 * @author elijah
 * @package app\core 
 */


class Application{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public function __construct($root_dir)
    {
        self::$ROOT_DIR = $root_dir;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }


    public function run()
    {
        // print the resposne from resolve!
        echo $this->router->resolve();
        exit;
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