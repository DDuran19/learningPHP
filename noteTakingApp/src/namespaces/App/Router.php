<?php

namespace App;

abstract class HttpMethod
{
    public const GET = 'get';
    public const POST = 'post';
    public const PUT = 'put';
    public const DELETE = 'delete';
    public const PATCH = 'patch';
}

abstract class Controllers
{
    public const ABOUT = "about";
    public const CONTACT = "contact";
    public const HOME = "home";
    public const NOTES = "notes";
    public const NOTES_CREATE = "notes/create";
    public const ERROR = "error";
}

class RouteParams
{
    public string $uri;
    public string $controller;
    public string $method;
    public bool $view;


    /**
     * Initializes a new instance of the RouteParams class.
     *
     * @param string $uri        The URI of the route.
     * @param string $controller The controller associated with the route.
     * @param string $method The HTTP method of the route.
     * @param bool $view       The view associated with the route (defaults to 'view').
     */
    public function __construct(string $uri, string $controller, string $method, bool $view)
    {
        $this->uri = $uri;
        $this->controller = $controller;
        $this->method = $method;
        $this->view = $view;
    }
}
class Router
{
    protected $routes = [];
    private $methodActionMap = [
        HttpMethod::GET => 'show',
        HttpMethod::POST => 'store',
        HttpMethod::PUT => 'put',
        HttpMethod::DELETE => 'destroy',
        HttpMethod::PATCH => 'patch',
    ];
    function getFileName($route, $action)
    {
        if ($route->view && $route->method === HttpMethod::GET) {
            return 'show.php';
        } elseif ($route->method === HttpMethod::GET) {
            return 'index.php';
        } else {
            return $action . '.php';
        };
    }
    private function _addRoute(RouteParams $route)
    {
        $action = $this->methodActionMap[$route->method];



        $fileName = $this->getFileName($route, $action);
        $controller = CONTROLLERS . $route->controller . '/' . $fileName;
        $uri = $route->view ? preg_replace('/:\w+/', '*', $route->uri) : $route->uri;

        return [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $route->method
        ];
    }
    public function get($uri, $controller, bool $view = false)
    {
        array_push($this->routes, $this->_addRoute(new RouteParams($uri, $controller, HttpMethod::GET, $view)));
        return $this;
    }

    public function post(string $uri, $controller, bool $view = false)
    {
        array_push($this->routes, $this->_addRoute(new RouteParams($uri, $controller, HttpMethod::POST, $view)));
        return $this;
    }

    public function put(string $uri, $controller, bool $view = false)
    {
        array_push($this->routes, $this->_addRoute(new RouteParams($uri, $controller, HttpMethod::PUT, $view)));
        return $this;
    }

    public function delete(string $uri, $controller, bool $view = false)
    {
        array_push($this->routes, $this->_addRoute(new RouteParams($uri, $controller, HttpMethod::DELETE, $view)));
        return $this;
    }

    public function patch(string $uri, $controller, bool $view = false)
    {
        array_push($this->routes, $this->_addRoute(new RouteParams($uri, $controller, HttpMethod::PATCH, $view)));
        return $this;
    }

    public function render($uri)
    {
        $uriArray = explode("/", $uri);
        $uriPartCount = count($uriArray);

        // echo '<pre>';
        // var_dump($this->routes);
        // echo '</pre>';
        foreach ($this->routes as $route) {

            $routeArray = explode("/", $route['uri']);
            $routePartCount = count($routeArray);
            // echo '<pre>';
            // var_dump($route['uri']);
            // echo '</pre>';
            if ($uriPartCount !== $routePartCount) {
                continue;
            }
            $notMatched = 0;

            for ($i = 0; $i < $routePartCount; $i++) {
                $isWildCard = $routeArray[$i] === "*";
                if (!$isWildCard && $uriArray[$i] !== $routeArray[$i]) {
                    $notMatched++;
                    break;
                }
            }

            if ($notMatched === 0) {
                if (strtoupper($route['method']) === $_SERVER['REQUEST_METHOD']) {
                    return require $route['controller'];
                }
            }
        }

        $this->abort(404);
    }

    public static function abort($code = 404)
    {
        http_response_code($code);
        require VIEWS . '/errors/' . $code . '.php';
        exit();
    }
}
