<?php

namespace app\core;

class Router
{

    public Request $request;

    protected array $routes = [];


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            return "Not Found";
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }
    }


    public function renderView($view)
    {
        include Application::$ROOT_PATH . "/views/$view.php";
    }
}
