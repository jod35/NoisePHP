<?php

namespace app\core;

class Application
{
    public Request $request;
    public Router $router;
    public Response $response;

    public static string $ROOT_PATH;


    public function __construct($rootPath)

    {
        self::$ROOT_PATH = $rootPath;
        $this->request = new Request();

        $this->response = new Response();

        $this->router = new Router($this->request,$this->response);
    }


    public function run()
    {
        $this->router->resolve();
    }
}
