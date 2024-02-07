<?php
  namespace app\controllers;

  use app\controllers\Controller;

  class Home extends Controller
  {
    public function index(array $args)
    {
      return view('home', [
        'title' => 'home',
        'extends' => 'main'
      ]);
    }
  }