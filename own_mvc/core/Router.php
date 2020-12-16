<?php

// class for routing 

class Router {
    public function __construct()
    {
        
    }

    public static function test()
    {

    }

    public function get($address)
    {
        $uri = $this->httpsOrHttp();
        header('Location: '.$uri."$address/");
        exit;
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