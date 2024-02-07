<?php
  use app\classes\helpers\FormatException;

  function formatException(Throwable $throw)
  {
    return FormatException::throw($throw);
  }