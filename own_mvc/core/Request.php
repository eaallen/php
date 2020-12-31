<?php
namespace app\core;

/**
 * @author elijah
 * @package app\core 
 * 
 */


class Request{
    public function getPath():string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path,'?');

        if(!$position){
            return $path;
        }
        return substr($path, 0,$position);
    }

    public function getMethod():string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->getMethod() === 'get';
    }

    public function isPost()
    {
        return $this->getMethod() === 'post';
    }

    /**
     * Method getBody
     * returns data from get or post request
     */
    public function getBody():array
    {
        var_dump($this->getMethod());
        $body = [];
        if($this->getMethod()==='get'){
            foreach ($_GET as $key => $value) {
                $body[$key]= filter_input(INPUT_GET, $key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if($this->getMethod()==='post'){
            foreach ($_POST as $key => $value) {
                $body[$key]= filter_input(INPUT_POST, $key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}
