<?php
  namespace app\classes\validate;

  use app\classes\helpers\Flash;
  use app\classes\helpers\Old;
  use app\interfaces\ValidateInterface;

  class ValidateRequired implements ValidateInterface
  {
    public function handle($field, $param)
    {
      $string = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);

      if ($string === '')
      {
        Flash::set($field, "O campo {$field} é obrigatório");
        return false;
      }

      Old::set($field, $string);

      return $string;
    }
  }