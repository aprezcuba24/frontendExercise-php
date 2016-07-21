<?php
ini_set('display_errors', 'On');
ini_set('display_errors', 1);

require_once 'autoload.php';

$di = new \Core\DIContainer();
$di->add(\Core\Contracts\TemplateRenderInterface::class, function () {
    return new \Core\TemplateRender('layout', __DIR__.'/Templates');
});
$di->add(\Core\Contracts\RouterInterface::class, function (\Core\Contracts\DIContainerInterface $di) {
    return new \Core\Router($di);
});

$router = $di->get(\Core\Contracts\RouterInterface::class);

require_once 'routes.php';

$request = \Core\Request::createRequest();

$response = $router->execute($request);

echo $response;