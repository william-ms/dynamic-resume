<?php

namespace app\controllers\site;

use app\database\models\ProjectModel;
use app\library\database\actions\FindAll;
use app\library\database\Query;
use app\library\controllers\Controller;

class HomeController extends Controller
{
    public function index(array $args)
    {
        $projects = (new ProjectModel)->execute(new FindAll((new Query)->where('id', 'in', [1, 2, 3, 4, 5, 6])));

        return view('site.home', [
            'title' => 'Home',
            'projects' => $projects,
        ]);
    }
}