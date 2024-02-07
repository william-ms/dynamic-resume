<?php
  namespace app\classes\block;

  class BlockPostRequest
  {
    public static function block()
    { 
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
          echo 'Você não pode fazer isso!';
          die();
        }

    }
  }