<?php
  namespace app\database\activerecord;

  use app\interfaces\ActiveRecordInterface;
  use app\interfaces\ExecuteInterface;
  use app\database\connection\Connection;
  use Exception;
  use Throwable;

  class Delete implements ExecuteInterface
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
        $prepare = $connection->prepare($query);
        $prepare->execute([$this->field => $this->value]);
      }
      catch(Throwable $throw)
      {
        formatException($throw);
      }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
      if ($activeRecordInterface->getAttributes())
      {
        throw new Exception('Para deletar não precisa passar atributos');
      }

      $sql = "delete from {$activeRecordInterface->getTable()} ";
      $sql .= "where {$this->field} = :{$this->field}";

      return $sql;
    }
  }