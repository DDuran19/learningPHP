<?php

namespace App;

class Container
{
    protected $bindings = [];
    public function bind(string $key, callable $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve(string $key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding for key: {$key}");
        }
        $resolver = ($this->bindings[$key]);
        return call_user_func($resolver);
    }
}
