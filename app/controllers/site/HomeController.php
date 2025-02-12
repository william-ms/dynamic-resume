<?php

namespace app\controllers\site;

use app\database\models\ProjectModel;
use app\database\models\ImageModel;
use app\library\database\actions\FindAll;
use app\library\database\Query;
use app\library\database\relations\RelationshipHasMany;
use app\library\controllers\Controller;

class HomeController extends Controller
{
    public function index(array $args)
    {
        $query = (new Query())->where('id', 'in', [1, 2, 3, 4, 5, 6])->order('id DESC');

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

        return view('site.home', [
            'title' => 'Home',
            'projects' => $projects,
        ]);
    }
}