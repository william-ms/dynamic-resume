<?php
  namespace app\database\activerecord;

  use app\interfaces\ActiveRecordInterface;
  use app\interfaces\ExecuteInterface;
  use app\database\connection\Connection;
  use Throwable;

  class FindBy implements ExecuteInterface
  {
    public function __construct(private string $field, private string|int $value, private string $fields = '*')
    {
      $this->field = $field;
      $this->value = $value;
      $this->fields = $fields;
    }

    public function execute(ActiveRecordInterface $activeRecordInterface)
    {
      try
      {
        $query = $this->createQuery($activeRecordInterface);

        $connection = Connection::connect();
        $prepare = $connection->prepare($query);
        $prepare->execute([$this->field => $this->value]);
        return $prepare->fetch();
      }
      catch(Throwable $throw)
      {
        formatException($throw);
      }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
      $sql = "select {$this->fields} from {$activeRecordInterface->getTable()} ";
      $sql .= "where {$this->field} = :{$this->field}";

      return $sql;
    }
  }