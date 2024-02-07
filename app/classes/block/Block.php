<?php
  namespace app\classes\block;

  use app\core\MethodExtract;
  use app\interfaces\ControllerInterface;

  class Block
  {
    public static function getMethodsToBlock(ControllerInterface $controllerInterface, array $blockMethods)
    {
      $blockMethod = false;
      $methods = get_class_methods($controllerInterface);
      [ $actualMethod ] = MethodExtract::extract($controllerInterface);

      foreach($methods as $method)
      {
        if(in_array($method, $blockMethods) and $method === $actualMethod)
        {
          $blockMethod = true;
        }
      }

      return $blockMethod;
    }
  }