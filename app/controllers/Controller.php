<?php
  namespace app\controllers;

  use app\interfaces\ControllerInterface;

  class Controller implements ControllerInterface
  {
    public function index(array $args){}

    public function edit(array $args){}

    public function show(array $args){}

    public function update(array $args){}

    public function create(){}

    public function store(){}

    public function destroy(array $args){}
  }