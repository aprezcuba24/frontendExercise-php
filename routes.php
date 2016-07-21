<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */

use Core\Contracts\TemplateRenderInterface;
use Core\Contracts\RouterInterface;

$router->get('/', function (TemplateRenderInterface $templateRender) {
    return $templateRender->render('home');
});

$router->get('/test', function () {
    return 'TEST';
});