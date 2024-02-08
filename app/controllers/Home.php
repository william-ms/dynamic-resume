<?php
  namespace app\controllers;

  use app\controllers\Controller;
  use app\database\activerecord\FindAll;
  use app\models\ProjectsModel;

  class Home extends Controller
  {
    public function index(array $args)
    {
      $projects = (new ProjectsModel)->execute(new FindAll());
      $id_projects = [7, 2, 3, 4, 5, 1];
      $projects_selected = [];

      foreach($id_projects as $id)
      {
        foreach($projects as $project)
        {
          if($id == $project->id)
          {
            $projects_selected[$id] = $project;
          }
        }
      }

      return view('home', [
        'title' => 'home',
        'extends' => 'main',
        'projects' => $projects,
      ]);
    }
  }