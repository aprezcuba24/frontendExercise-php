<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */
namespace Core\Contracts;

interface DIContainerInterface
{
    public function add($contract, $callback);
    public function get($contract);
    public function resolve($callback);
}