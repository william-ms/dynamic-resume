<?php

namespace app\middlewares;

use Exception;

class CsrfMiddleware
{
	public static function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$_SESSION['__csrf'] = bin2hex(random_bytes(32));
		}
	}

	public static function check()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		  	return;
		}

		if (!isset($_POST['csrf'])) {
			throw new Exception('CSRF token not found');
		}

		if (!isset($_SESSION['__csrf'])) {
			throw new Exception('CSRF token not found');
		}

		if (!hash_equals($_SESSION['__csrf'], $_POST['csrf'])) {
			throw new Exception("CSRF token mismatch");
		}
	}
}
