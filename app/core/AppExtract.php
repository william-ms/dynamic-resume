<?php
  namespace app\core;

  use app\interfaces\AppInterface;

  class AppExtract implements AppInterface
  {
    private array $uri;
    private int $sliceIndexStartFrom;

    public function __construct()
    {
      $this->uri = Uri::uri();
    }

    public function controller():string
    {
      return ControllerExtract::extract($this->uri);
    }

    public function method($controller):string
    {
      [$method, $sliceIndexStartFrom] = MethodExtract::extract($this->uri, $controller);
      $this->sliceIndexStartFrom = $sliceIndexStartFrom;

      return $method;
    }

    public function params():array
    {
      return ParamsExtract::extract($this->uri, $this->sliceIndexStartFrom);
    }
  }