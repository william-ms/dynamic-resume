<?php
  namespace app\database\activerecord;

  use app\interfaces\ActiveRecordInterface;
  use app\interfaces\ExecuteInterface;
  use app\database\connection\Connection;
  use Exception;
  use Throwable;

  class Update implements ExecuteInterface
  {
    public function __construct(private string $field, private string|int $value)
    {
      $this->field = $field;
      $this->value = $value;
    }

    public function execute(ActiveRecordInterface $activeRecordInterface)
    {
      try
      {
        $query = $this->createQuery($activeRecordInterface);
        $connection = Connection::connect();

        $attributes = array_merge($activeRecordInterface->getAttributes(), [$this->field => $this->value]);

        $prepare = $connection->prepare($query);
        $prepare->execute($attributes);
      }
      catch(Throwable $throw)
      {
        formatException($throw);
      }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
      if(array_key_exists('id', $activeRecordInterface->getAttributes()))
      {
        throw new Exception("O campo id não pode ser passado para o update");
      }

      $sql = "update {$activeRecordInterface->getTable()} set ";

      foreach ($activeRecordInterface->getAttributes() as $key => $value)
      {
        $sql .= "{$key}=:{$key},";
      }

      $sql = rtrim($sql, ',');

      $sql .= " where {$this->field} = :{$this->field}";

      return $sql;
    }
  }