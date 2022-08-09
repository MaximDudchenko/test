<?php

namespace Core;

class Router
{
    protected array $routes = [], $params = [];

    protected array $convertTypes = [
        'd' => 'int',
        's' => 'string'
    ];

    public function add(string $route, array $params = []) {

        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z]+)', $route);
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    public function dispatch(string $url)
    {
        $url = $this->removeUrlVariables($url);
        if ($this->match($url)) {

            if (isset($this->params['method']) && ($_SERVER['REQUEST_METHOD'] !== $this->params['method'])) {
                throw new \Exception('Method ' . $_SERVER['REQUEST_METHOD'] . ' doesn`t supported this route');
            }

            unset($this->params['method']);

            $controller = $this->params['controller'];

            if (class_exists($controller)) {
                unset($this->params['controller']);

                $action = $this->params['action'];

                if (method_exists($controller, $action)) {
                    $controller = new $controller;
                    unset($this->params['action']);

//                    if ($controller->before($action)) {
                        call_user_func_array([$controller, $action], $this->params);
//                        $controller->after($action);
//                    }
                } else {
                    throw new \Exception("Action {$this->params['action']} not found");
                }
            } else {
                throw new \Exception("Controller {$this->params['controller']} not found");
            }
        } else {
            throw new \Exception('Route not matched', 404);
        }
    }

    protected function removeUrlVariables(string $url): string
    {
        $url = trim($url, '/');
        if ($url != '') {
            $parts = explode('?', $url, 2);
            $url = $parts[0];

        }
        return $url;
    }

    protected function match(string $url) {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                preg_match_all('|\(\?P<[\w]+>\\\\(\w[\+])\)|', $route, $types);
                $step = 0;

                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $lastKey = count($types) - 1;
                        $types[$lastKey] = str_replace('+', '', $types[$lastKey]);
                        settype($match, $this->convertTypes[$types[$lastKey][$step]]);
                        $params[$key] = $match;
                        $step++;
                    }
                }

                $this->params = $params;
                return true;
            }
        }
        return false;
    }
}