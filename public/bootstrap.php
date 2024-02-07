<?php
  session_start();

  require '../vendor/autoload.php';

  use app\core\App;
  use app\core\AppExtract;

  try
  {
    $app = new App(new AppExtract);
    $app->controller();
    $app->view();
  }
  catch(Throwable $throw)
  {
    echo formatException($throw);
  }