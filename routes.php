<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */

use Core\Contracts\TemplateRenderInterface;
use Core\Contracts\RouterInterface;
use Core\Contracts\SecurityInterface;
use Core\Request;

/**@var $router RouterInterface*/
$router->addAfter('security', function (RouterInterface $router, SecurityInterface $security) {
    if ($security->isAuth()) {
        return;
    }

    return $router->redirect('/');
});

$router->get('/logout', function (
    SecurityInterface $security,
    RouterInterface $router
) {
    $security->logout();

    return $router->redirect('/');
});

$router->any('/', function (
    TemplateRenderInterface $templateRender,
    SecurityInterface $security,
    Request $request,
    RouterInterface $router
) {
    $errors = '';
    if ($request->is(Request::POST)) {
        try {
            $security->login($request->get('username'), $request->get('password'));

            return $router->redirect('/internal');
        } catch (\Exception $e) {
            $errors = $e->getMessage();
        }
    }
    
    return $templateRender->render('home', [
        'errors' => $errors,
    ]);
});

$router->get('/internal', function (TemplateRenderInterface $templateRender) {
    return $templateRender->render('internal');
}, [
    'after' => ['security']
]);