<?php
  namespace app\classes\helpers;

  class Flash
  {
    public static function set($key, $message, $alert = 'danger')
    {
      if(!isset($_SESSION['__flash'][$key]))
      {
        $_SESSION['__flash'][$key] = [
          'message' => $message,
          'alert' => $alert
        ];
      }
    }

    public static function get($key)
    {
      if(isset($_SESSION['__flash'][$key]))
      {
        $flash = $_SESSION['__flash'][$key];
        unset($_SESSION['__flash'][$key]);

        return $flash;
      }
    }
  }