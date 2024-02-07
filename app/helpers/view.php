<?php
  use app\core\View;

  function view(string $view, array $data = [])
  {
    return View::set($view, $data);
  }

  function include_extends($extends, $data)
  {
    $_SESSION['__view']['data'] = $data;

    return ROOT.VIEW_PATH. $extends .'.php';
  }

  function include_view($view)
  {
    $file = ROOT.VIEW_PATH. $view .'.php';

    if(isset($_SESSION['__view']['data']))
    {
      $data = $_SESSION['__view']['data'];
      unset($_SESSION['__view']['data']);
    }
      
    extract($data);

    (file_exists($file))
    ? require_once($file)
    : throw new Exception("A view {$view} não foi encontrada! em app/views/");
  }

  function include_partial($partial)
  {
    $file = ROOT.VIEW_PATH. $partial .'.php';

    (file_exists($file))
    ? require_once($file)
    : throw new Exception("A view {$partial} não foi encontrada! em app/views/");
  }

