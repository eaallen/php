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
    public static Application $app;
    public Response $response;
    public function __construct($root_dir)
    {
        self::$ROOT_DIR = $root_dir;
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->response = new Response();
    }


    public function run()
    {
        // print the Response from resolve!
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