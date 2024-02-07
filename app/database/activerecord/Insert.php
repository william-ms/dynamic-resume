<?php
  namespace app\database\activerecord;

  use app\interfaces\ActiveRecordInterface;
  use app\interfaces\ExecuteInterface;
  use app\database\connection\Connection;
  use Throwable;

  class Insert implements ExecuteInterface
  {
    public function execute(ActiveRecordInterface $activeRecordInterface)
    {
      try
      {
        $query = $this->createQuery($activeRecordInterface);

        $connection = Connection::connect();
        $prepare = $connection->prepare($query);
        $prepare->execute($activeRecordInterface->getAttributes());
      }
      catch(Throwable $throw)
      {
        formatException($throw);
      }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
      $sql = "insert into {$activeRecordInterface->getTable()} (";
      $sql .= implode(',', array_keys($activeRecordInterface->getAttributes()));
      $sql .= ") values (:";
      $sql .= implode(',:' ,array_keys($activeRecordInterface->getAttributes()));
      $sql .= ")";

      return $sql;
    }
  }