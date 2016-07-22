<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */
namespace Core;

use Core\Contracts\SessionInterface;

class Session implements SessionInterface
{
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key, $default = null)
    {
        return isset($_SESSION[$key])? $_SESSION[$key]: $default;
    }

    public function clear()
    {
        $_SESSION = [];
    }
}