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
    protected $gets   = [];
    protected $posts  = [];
    protected $after  = [];
    protected $before = [];
    protected $di;

    public function __construct(DIContainerInterface $di)
    {
        $this->di = $di;
    }

    public function get($uri, $callback, $filters = [])
    {
        $this->gets[$uri] = [
            'callback' => $callback,
            'filters'  => $filters,
        ];
    }

    public function post($uri, $callback, $filters = [])
    {
        $this->posts[$uri] = [
            'callback' => $callback,
            'filters'  => $filters,
        ];
    }

    public function any($uri, $callback, $filters = [])
    {
        $this->get($uri, $callback, $filters);
        $this->post($uri, $callback, $filters);
    }

    public function addAfter($name, $callback)
    {
        $this->after[$name] = $callback;
    }

    public function addBefore($name, $callback)
    {
        $this->before[$name] = $callback;
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
        $filters = $handlers[$uri]['filters'];
        if (isset($filters['after'])) {
            foreach ($filters['after'] as $filterName) {
                if (!isset($this->after[$filterName])) {
                    throw new \InvalidArgumentException('No existe un filtro after con ese nombre.');
                }
                $result = $this->di->resolve($this->after[$filterName]);
                if ($result instanceof Response) {
                    return $result;
                }
            }
        }
        $callback = $handlers[$uri]['callback'];
        $result = $this->di->resolve($callback);
        if (!$result instanceof Response) {
            $result = new Response($result);
        }
        //Aqui se debe implementar despues los filtros before

        return $result;
    }

    public function redirect($uri)
    {
        $uri = '/index.php'.$uri;

        return new Response('', 302, [
            'Location' => $uri,
        ]);
    }
}