<?php
declare(strict_types=1);

namespace App\Core;
use App\Core\Container;

class Router
{
    protected array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function __construct(protected Container $container)
    {
        $this->container = $container;
    }

    public function get(string $path, array $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, array $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch(string $method, string $uri): void
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';

        if (isset($this->routes[$method][$uri])) {
            
            [$controller, $action] = $this->routes[$method][$uri];

            $instance = $this->container->resolve($controller);
            call_user_func([$instance, $action]);
            return;
        }

        foreach ($this->routes[$method] as $route => $handler) {

            $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $route);
            $pattern = "#^" . rtrim($pattern, '/') . "$#";

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches);

                [$controller, $action] = $handler;

                $instance = $this->container->resolve($controller);

                call_user_func_array([$instance, $action], $matches);

                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
        exit;
    }
}
