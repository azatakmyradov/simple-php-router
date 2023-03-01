<?php

namespace Azatakmyradov\Routing;

use Azatakmyradov\Routing\Controllers\Controller;
use Azatakmyradov\Routing\Exceptions\RouteNotFoundException;

class Router
{
    protected array $routes = [];

    protected function add($method, $uri, $controller): void
    {
        $this->routes[] = [
            'uri' => str_starts_with($uri, '/') ? $uri : "/{$uri}",
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller): void
    {
        $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller): void
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller): void
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller): void
    {
        $this->add('PUT', $uri, $controller);
    }

    /**
     * @throws RouteNotFoundException
     */
    public function route($uri) {
        return $this->match($uri);
    }

    /**
     * @throws RouteNotFoundException
     */
    public function match($uri)
    {
        // get method type
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

        // Check routes for matches
        foreach ($this->routes as $route) {
            // skip iteration if methods don't match
            if (! ($route['method'] === $method)) { continue; }

            // check if there's exact match
            if ($route['uri'] === $uri) {
                if (isClosure($route['controller'])) return $route['controller']();

                return Controller::load($route['controller'], []);
            }

            $uri = rtrim($uri, '/');
            $wildcards = [];
            $route_uri = explode('/', $route['uri']);
            $user_uri = explode('/', $uri);

            // if it doesn't match continue to the next iteration
            if (! (count($route_uri) === count($user_uri)) ) continue;

            // extract wildcard data if any
            foreach ($route_uri as $key => $item) {
                if (! preg_match('/{.*?}/', $item, $matches)) continue;

                $wildcard_name = str_replace(['{', '}'], '', $matches[0]);
                $wildcards[$wildcard_name] = $user_uri[$key];
                $route_uri[$key] = $user_uri[$key];
            }

            // check if uri matches with wildcards
            if (! (implode('/', $route_uri) === implode('/', $user_uri)) ) continue;

            if (isClosure($route['controller'])) return $route['controller'](...$wildcards);

            return Controller::load($route['controller'], $wildcards);
        }

        return throw new RouteNotFoundException('Route was not found');
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}