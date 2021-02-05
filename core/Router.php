<?php

namespace App\Core;

use Exception;

class Router
{
    /**
     * All registered routes.
     *
     * @var array
     */
    public $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'PUTCH' => [],
        'DELETE' => [],
    ];

    /**
     * Register a route.
     *
     * @param string $uri
     * @param array $arguments
     */
    public function __call($method, $arguments)
    {
        $method = strtoupper($method);
        [$uri, $controller] = $arguments;
        $this->routes[$method][$uri] = $controller;
    }

    /**
     * Load a user's routes file.
     *
     * @param string $file
     */
    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    /**
     * Load the requested URI's associated controller method.
     *
     * @param string $uri
     * @param string $method
     */
    public function direct($uri, $method)
    {
        if ($this->check_route_exists($uri, $method)) {
            return $this->callAction(
                ...explode("@", $this->routes[$method][$uri])
            );
        }

        throw new Exception("No route defined for this uri!");
    }

    /**
     * Load and call the relevant controller action.
     *
     * @param string $controller
     * @param string $action
     */
    protected function callAction($controller, $action)
    {
        if (!method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }

        return call_user_func_array([new $controller, $action], []);
    }

    protected function check_route_exists($uri, $method): bool
    {
        return array_key_exists($uri, $this->routes[$method]);
    }
}
