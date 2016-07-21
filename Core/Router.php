<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */
namespace Core;

use Core\Contracts\DIContainerInterface;
use Core\Contracts\RouterInterface;

class Router implements RouterInterface
{
    protected $gets  = [];
    protected $posts = [];
    protected $di;

    public function __construct(DIContainerInterface $di)
    {
        $this->di = $di;
    }

    public function get($uri, $callback)
    {
        $this->gets[$uri] = $callback;
    }

    public function post($uri, $callback)
    {
        $this->posts[$uri] = $callback;
    }

    public function any($uri, $callback)
    {
        $this->get($uri, $callback);
        $this->posts($uri, $callback);
    }

    public function execute(Request $request)
    {
        $handlers = $this->gets;
        if ($request->is(Request::POST)) {
            $handlers = $this->posts;
        }
        $uri = $request->getUri();
        if (!isset($handlers[$uri])) {
            return new Response($uri, 404);
        }
        $result = $this->di->resolve($handlers[$uri]);
        if ($result instanceof Response) {
            return $result;
        }

        return new Response($result);
    }

    public function redirect($uri)
    {
        return new Response('', 302, [
            'Location' => 'index.php'.$uri,
        ]);
    }
}