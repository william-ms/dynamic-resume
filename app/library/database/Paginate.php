<?php

namespace app\library\database;

use app\library\database\actions\Count;
use Exception;

class Paginate
{
  	private int $actualPage;
  	private int $pages;

  	public function __construct(private Model $model, private Query $query)
  	{
    	$this->actualPage = $_GET['page'] ?? 1;

    	$perPage = $this->getLimit();

    	$query->offset(ceil($this->actualPage - 1) * $perPage);

    	$totalRecords = $model->execute(new Count($query))->total;

    	$this->pages = ceil($totalRecords / $perPage);
  	}

	public function getLimit()
	{
		$limit = $this->query->get('limit');

		if (!$limit) {
			throw new Exception("Limit method is required to paginate");
		}

		return $limit;
	}

	public function createLink(int $linksPerPage)
	{
		$startLink = max(1, $this->actualPage - floor($linksPerPage / 2));
		$endLink = min($startLink + $linksPerPage - 1, $this->pages);

		for ($i = $startLink; $i <= $endLink; $i++) {
			if ($i === $this->actualPage) {
				echo "<strong>{$i}</strong>";
			} else {
				echo "<a href='?page={$i}'>{$i}</a>";
			}
		}
	}
}
