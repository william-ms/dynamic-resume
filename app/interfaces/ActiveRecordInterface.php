<?php
  namespace app\interfaces;

  interface ActiveRecordInterface
  {
    public function __set($attribute, $value);
    public function __get($attribute);
    public function execute(ExecuteInterface $executeInterface);
    public function getTable();
    public function getAttributes();
  }