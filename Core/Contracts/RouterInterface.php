<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */
namespace Core\Contracts;

use Core\Request;

interface RouterInterface
{
    public function get($uri, $callback);
    public function post($uri, $callback);
    public function any($uri, $callback);
    public function execute(Request $request);
    public function redirect($uri);
}