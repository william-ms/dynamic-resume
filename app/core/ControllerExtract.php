<?php
  namespace app\core;

  use Exception;

  class ControllerExtract
  {
    public static function extract($uri):string
    {
      $folder = FolderExtract::extract($uri);

      if($folder)
      {
        $controller = Uri::uriExist($uri, index:1);
        $namespace = "app\\controllers\\". $folder ."\\";
      }
      else
      {
        $controller = Uri::uriExist($uri, index:0);
        $namespace = "app\\controllers\\";
      }

      if(!$controller)
      {
        $controller = CONTROLLER_DEFAULT;
      }

      $namespaceAndController = $namespace . ucfirst($controller);

      if(class_exists($namespaceAndController))
      {
        return $namespaceAndController;
      }
      else{
        throw new Exception(message: "O controller {$controller} não foi encontrado na pasta {$namespace}");
      }
    }
  }