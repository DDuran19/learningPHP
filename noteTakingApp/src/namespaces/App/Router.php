<?php

namespace App;

class Router
{
    protected $routes = [];

    private function _addRoute($uri, $controller, $method)
    {
        $controllerPath = CONTROLLERS . $controller;
        // if controllerPath does NOT end in .php, add index.php
        if (!str_ends_with($controllerPath, '.php')) {
            $controllerPath .= '/index.php';
        }

        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controllerPath,
            'method' => $method
        ];
    }
    public function get($uri, $controller)
    {
        $this->_addRoute($uri, $controller, 'GET');
        return $this;
    }

    public function post($uri, $controller)
    {
        $this->_addRoute($uri, $controller, 'POST');
        return $this;
    }

    public function put($uri, $controller)
    {
        $this->_addRoute($uri, $controller, 'PUT');
        return $this;
    }

    public function delete($uri, $controller)
    {
        $this->_addRoute($uri, $controller, 'DELETE');
        return $this;
    }

    public function patch($uri, $controller)
    {
        $this->_addRoute($uri, $controller, 'PATCH');
        return $this;
    }
}
