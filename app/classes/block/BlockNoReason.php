<?php
  namespace app\classes\block;

  use app\classes\block\BlockPostRequest;
  use app\interfaces\ControllerInterface;

  class BlockNoReason
  {
    public static function block(ControllerInterface $controllerInterface, array $blockMethods)
    {
      $blockMethods = Block::getMethodsToBlock($controllerInterface, $blockMethods);
      
      if($blockMethods)
      {
        // BlockPostRequest::block();
        return redirect('/');
      }
    }
  }