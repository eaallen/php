<?php

namespace app\core;

/**
 * @author elijah
 * @package app\core 
 * 
 */


class Response{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}