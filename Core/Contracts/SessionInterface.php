<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */
namespace Core\Contracts;

interface SessionInterface 
{
    public function set($key, $value);
    public function get($key, $default = NULL);
    public function clear();
}