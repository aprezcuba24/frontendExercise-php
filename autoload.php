<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */

spl_autoload_register(function ($class) {
    $file = __DIR__.'/'.str_replace('\\', '/', $class).'.php';
    if (!file_exists($file)) {
        return;
    }
    include $file;
});
