<?php
  namespace app\core;

  use Exception;

  class View
  {
    public static function set(string $view, array $data)
    {
      if(!isset($_SESSION['__view']['view'])) $_SESSION['__view']['view'] = $view;
      if(!isset($_SESSION['__view']['data'])) $_SESSION['__view']['data'] = $data;
    }

    public static function data()
    {
      if(isset($_SESSION['__view']['data']))
      {
        $data = $_SESSION['__view']['data'];
        unset($_SESSION['__view']['data']);
      }

      return $data;
    }

    public static function view()
    {
      if(isset($_SESSION['__view']['view']))
      {
        $view = $_SESSION['__view']['view'];
        unset($_SESSION['__view']['view']);
      }
      else
      {
        $view = '';
      }

      if(preg_match('/[.\/]/', $view))
      {
        $view = self::folder($view);
      }

      return $view;
    }

    public static function folder($view)
    {
      $array = preg_split('/[.\/]/', $view);
      $arrayCount = count($array);

      $view = $array[$arrayCount-1];
      $folder = "";

      for($i = 0; $i < $arrayCount-1; $i++)
      {
        $folder = $folder . $array[$i] . '/';

        if(!is_dir(ROOT.VIEW_PATH.$folder))
        {
          throw new Exception ("A pasta {$array[$i]} não foi encontrada em app/views/");
        }
      }

      return $folder.$view;
    }
  }