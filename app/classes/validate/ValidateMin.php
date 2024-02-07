<?php
  namespace app\classes\validate;

  use app\classes\helpers\Flash;
  use app\classes\helpers\Old;
  use app\interfaces\ValidateInterface;

  class ValidateMin implements ValidateInterface
  {
    public function handle($field, $param)
    {
      $string = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);

      if (strlen($string) < $param)
      {
        Flash::set($field, "O campo deve ter no mínimo {$param} letras");
        return false;
      }

      Old::set($field, $string);

      return $string;
    }
  }