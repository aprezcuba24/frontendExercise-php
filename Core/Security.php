<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */
namespace Core;

use Core\Contracts\SecurityInterface;
use Core\Contracts\SessionInterface;

class Security implements SecurityInterface
{
    protected $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }
    public function login($username, $password)
    {
        if ($username != 'admin' || $password != 'admin') {
            throw new \InvalidArgumentException('Username y Password incorrectos');
        }
        $this->session->set('is_auth', true);
    }

    public function logout()
    {
        $this->session->clear();
    }

    public function isAuth()
    {
        return $this->session->get('is_auth', false);
    }
}