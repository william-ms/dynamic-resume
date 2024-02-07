<?php
  namespace app\core;

  class MethodExtract
  {
    public static function extract($uri, $controller)
    {
      $folder = FolderExtract::extract($uri);

      $sliceIndexStartFrom = 2;

      $method = (!$folder)
      ? Uri::uriExist($uri, index:1)
      : Uri::uriExist($uri, index:2);

      if($method === '' or $method === null)
      {
        $method = 'index';
      }

      if(!method_exists($controller, $method))
      {
        $method = 'index';
        $sliceIndexStartFrom = (!$folder) ? 1 : 2;
      }
      else
      {
        $sliceIndexStartFrom = (!$folder) ? 2 : 3;
      }

      return [$method, $sliceIndexStartFrom];
    }
  }