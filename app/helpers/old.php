<?php
  use app\classes\helpers\Old;

  function old($field)
  {
    return Old::get($field);
  }