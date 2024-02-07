<?php
  namespace app\interfaces;

  interface ExecuteInterface
  {
    public function execute(ActiveRecordInterface $activeRecordInterface);
  }