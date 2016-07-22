<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */
namespace Core\Contracts;

interface SecurityInterface
{
    public function login($username, $password);
    public function logout();
    public function isAuth();
}