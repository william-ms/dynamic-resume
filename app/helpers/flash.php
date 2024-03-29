<?php
  use app\classes\helpers\Flash;

  function flash($key)
  {
    $flash = Flash::get($key);

    if(isset($flash))
    {
      return "<span class='alert alert-{$flash['alert']}'>{$flash['message']}</span>";
    }
  }