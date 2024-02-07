<?php
  namespace app\core;

use app\interfaces\AppInterface;
use app\interfaces\ControllerInterface;
use Exception;

  class App
  {
    private ControllerInterface $controller;
    private $appInterface;

    public function __construct(AppInterface $appInterface)
    {
      $this->appInterface = $appInterface;
    }

    public function controller()
    {
      $controller = $this->appInterface->controller();
      $method = $this->appInterface->method($controller);
      $params = $this->appInterface->params();

      $this->controller = new $controller;
      $this->controller->$method($params);
    }

    public function view()
    {
      if($_SERVER['REQUEST_METHOD'] === 'GET')
      {
        $view = View::view();

        if(!isset($view) or $view === '')
        {
          return;
        }

        $data = View::data();

        extract($data);

        (isset($extends))
        ? $file = include_extends($extends, $data)
        : $file = ROOT.VIEW_PATH. $view .'.php';

        (file_exists($file))
        ? require_once($file)
        : throw new Exception("A view {$view} não foi encontrada! em app/views/");
      }
    }
  }