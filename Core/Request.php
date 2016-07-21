<?php

namespace Core;

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */
class Request
{
    const POST = 'POST';
    const GET  = 'GET';

    protected $method;
    protected $uri;

    protected function __construct() {}

    public static function createRequest()
    {
        $request = new self();
        $request->method = count($_POST)? self::POST: self::GET;
        $request->uri = isset($_SERVER['PATH_INFO'])? $_SERVER['PATH_INFO']: '/';

        return $request;
    }

    public function get($key, $default = null)
    {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        }
        if (isset($_GET[$key])) {
            return $_GET[$key];
        }

        return $default;
    }

    public function is($method)
    {
        return $this->method == $method;
    }

    public function getUri()
    {
        return $this->uri;
    }
}