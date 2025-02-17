<?php

namespace app\database\connection;

use PDO;
use PDOException;

class Connection
{
	public static $pdo = null;

	public static function connect()
	{
		try {
			if (!static::$pdo) {
				static::$pdo = new PDO("mysql:host=" . DB['HOST'] . ";dbname=" . DB['NAME']."", DB['USERNAME'], DB['PASSWORD'], [
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
				]);
			}
	
			return static::$pdo;
		} catch(PDOException $e) {
			var_dump($e->getMessage());
		}
	}
}