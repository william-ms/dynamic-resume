<?php
  namespace app\database\activerecord;

  use app\interfaces\ActiveRecordInterface;
  use app\interfaces\ExecuteInterface;
  use ReflectionClass;

  abstract class ActiveRecord implements ActiveRecordInterface
  {
    protected $table = null;

    protected $attributes = [];

    public function __construct()
    {
      if(!$this->table)
      {
        $this->table = strtolower((new ReflectionClass($this))->getShortName());
      }
    }

    public function __set($attribute, $value)
    {
      $this->attributes[$attribute] = $value;
    }

    public function __get($attribute)
    {
      return $this->attributes[$attribute];
    }

    public function getTable()
    {
      return $this->table;
    }

    public function getAttributes()
    {
      return $this->attributes;
    }

    public function execute(ExecuteInterface $executeInterface)
    {
      return $executeInterface->execute($this);
    }
  }