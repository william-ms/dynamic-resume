<?php
  namespace app\models;

  use app\database\activerecord\ActiveRecord;

  class ProjectsModel extends ActiveRecord
  {
    protected $table = 'projects';
  }