<?php

namespace app\controllers\site;

use app\database\models\ProjectModel;
use app\library\database\actions\FindAll;
use app\library\controllers\Controller;

class ProjectController extends Controller
{
    public function index(array $args)
    {
        $projects = (new ProjectModel)->execute(new FindAll());

        return view('site.project.index', [
            'title' => 'Todos os Projetos',
            'projects' => $projects
        ]);
    }
}