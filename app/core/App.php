<?php

namespace app\core;

class App
{
    private string $uri;
    private object $route;

    public function __construct()
    {
        require_once('../config/app.php');
    }

    public function route()
    {
        require_once('../app/routes/web.php');

        $this->uri = UriExtract::extract();
        $this->route = RouteExtract::extract($this->uri);
    }

    public function controller()
    {
        $controller = ControllerExtract::extract($this->route->controller);
        $method = MethodExtract::extract($controller, $this->route->method);
        $params = ParamsExtract::extract($this->uri, $this->route->uri);
    
        return (new $controller)->$method($params);
    }
}