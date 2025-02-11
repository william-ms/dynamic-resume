<?php

use app\controllers\site\HomeController;
use app\controllers\site\ProjectController;
use app\library\routes\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/project', [ProjectController::class, 'index']);