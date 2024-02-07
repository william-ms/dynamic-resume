<?php
  namespace app\classes\validate;

  use app\interfaces\ValidateInterface;
  use Exception;

  class Validate
  {
    public bool $errors = false;
    public array $data = [];

    public function validationInstance(string $field, array $validation)
    {
      foreach ($validation as $classValidate)
      {
        $classValidate = 'Validate'. ucfirst(strtolower($classValidate));

        $namespace = "app\\classes\\validate\\";

        $class = $namespace . $classValidate;

        [ $class, $param ] = $this->classWithColon($class);

        (class_exists($class))
        ? $this->data[$field] = $this->executeClass(new $class, $field, $param)
        : throw new Exception("A classe {$classValidate} não foi encontrada em {$namespace}");
      }
    }

    private function classWithColon($class)
    {
      $param = null;

      if(str_contains($class, ':'))
      {
        [ $class, $param ] = explode(':', $class);
      }

      return [ $class, $param ];
    }

    public function handle(array $validations)
    {
      foreach ($validations as $field => $validation)
      {
        if(is_string($validation))
        {
          $validation = explode('|', $validation);
        }

        $this->validationInstance($field, $validation);
      }

      if(in_array(false, $this->data))
      {
        $this->errors = true;
      }
    }

    private function executeClass(ValidateInterface $validateInterface, $field, $param)
    {
      return $validateInterface->handle($field, $param);
    }
  }