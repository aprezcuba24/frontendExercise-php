<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */
namespace Core\Contracts;

use Core\Request;

interface RouterInterface
{
    public function get($uri, $callback, $filters = []);
    public function post($uri, $callback, $filters = []);
    public function any($uri, $callback, $filters = []);
    public function execute(Request $request);
    public function redirect($uri);
    public function addAfter($name, $callback);
    public function addBefore($name, $callback);
}