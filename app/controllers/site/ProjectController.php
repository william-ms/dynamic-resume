<?php

namespace app\controllers\site;

use app\database\models\ProjectModel;
use app\database\models\ImageModel;
use app\library\database\actions\FindAll;
use app\library\database\Query;
use app\library\database\relations\RelationshipHasMany;
use app\library\controllers\Controller;

class ProjectController extends Controller
{
    public function index(array $args)
    {
        $query = (new Query())->order('id DESC');

        $projects = (new ProjectModel)->execute_with_relationship(new FindAll($query), [
            [ImageModel::class, RelationshipHasMany::class, 'images']
        ]);

        foreach($projects as $key => $project) {
            foreach($project->images as $image) {
                if($image->type === 'thumb') {
                    $projects[$key]->thumb = $image;
                    continue;
                }
            }
        }

        return view('site.project.index', [
            'title' => 'Todos os Projetos',
            'projects' => $projects
        ]);
    }
}