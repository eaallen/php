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
    public Response $response;

    /**
     * Router Contsructor
     * @param \app\core\Request $request
     * @param \app\core\Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
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
            $this->response->setStatusCode(404);
            return $this->renderView("404");
        }

        if(is_string($callback)){
            return $this->renderView($callback);
        }

        if(is_array($callback)){
            $callback[0] = new $callback[0]();
        }

        echo call_user_func($callback, $this->request);
        // echo "<pre>";
        // var_dump($_SERVER);
        // echo "</pre>";
    }

    public function renderView($view, array $params=[])
    {
        $layout_content = $this->layoutContent();
        $view_content = $this->renderOnlyView($view, $params);
        // echo "$view_content";
        return str_replace('{{content}}',$view_content,$layout_content);
        // return str_replace('{{content}}',$view_content,$layout_content);
    }
    public function renderContent($view_content, array $params=[])
    {
        $layout_content = $this->layoutContent();
        // $view_content = $this->renderOnlyView($view, $params);
        // echo "$view_content";
        return str_replace('{{content}}',$view_content,$layout_content);
        // return str_replace('{{content}}',$view_content,$layout_content);
    }
    
    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, array $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
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