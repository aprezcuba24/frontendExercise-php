<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */
namespace Core;

use Core\Contracts\DIContainerInterface;

class DIContainer implements DIContainerInterface
{
    protected $services = [];
    protected $objects  = [];

    public function __construct()
    {
        $this->add(DIContainerInterface::class, $this);
    }

    public function add($contract, $callback)
    {
        $this->services[$contract] = $callback;
    }

    public function get($contract)
    {
        if (!isset($this->services[$contract])) {
            throw new \RuntimeException('No hay un servicio para ese contrato');
        }
        if (isset($this->objects[$contract])) {
            return $this->objects[$contract];
        }
        if (is_callable($this->services[$contract])) {
            $this->objects[$contract] = $this->resolve($this->services[$contract]);
        } else {
            $this->objects[$contract] = $this->services[$contract];
        }

        return $this->objects[$contract];
    }

    public function resolve($callback)
    {
        $reflection = new \ReflectionFunction($callback);
        $params = [];
        foreach ($reflection->getParameters() as $parameter) {
            $params[] = $this->get($parameter->getClass()->name);
        }

        return call_user_func_array($callback, $params);
    }
}