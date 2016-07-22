<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */

function isAuth() {
    global $di;
    return $di->get(\Core\Contracts\SecurityInterface::class)->isAuth();
}