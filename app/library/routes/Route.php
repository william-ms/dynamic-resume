<?php

namespace app\library\routes;

class Route
{
    public $type;
    public $uri;
    public $controller;
  	public $method;

	public function __construct($type, $uri, $controller)
	{
		$this->type = $type;
		$this->uri = $uri;
		$this->controller = $controller[0];
		$this->method = $controller[1];

		Routes::add_route($this->uri, $this);
	}

	public static function get($uri, $controller)
	{
		return new Route('get', $uri, $controller);
	}

	public static function post($uri, $controller)
	{
		return new Route('post', $uri, $controller);
	}
}