<?php
session_start();
ini_set('display_errors', 'On');
ini_set('display_errors', 1);

require_once 'autoload.php';

$request = \Core\Request::createRequest();

$di = new \Core\DIContainer();
$di->add(\Core\Contracts\TemplateRenderInterface::class, function () {
    return new \Core\TemplateRender('layout', __DIR__.'/Templates');
});
$di->add(\Core\Contracts\RouterInterface::class, function (\Core\Contracts\DIContainerInterface $di) {
    return new \Core\Router($di);
});
$di->add(\Core\Contracts\SessionInterface::class, function () {
    return new \Core\Session();
});
$di->add(\Core\Contracts\SecurityInterface::class, function (\Core\Contracts\SessionInterface $session) {
    return new \Core\Security($session);
});
$di->add(\Core\Request::class, $request);

$router = $di->get(\Core\Contracts\RouterInterface::class);

require_once 'routes.php';
require_once 'helpers.php';

$response = $router->execute($request);

echo $response;