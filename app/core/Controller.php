<?php

    namespace App\core;
    
    interface IController
    {
        public function index();
    }

    class Controller implements IController
    {
        protected $model;
        protected $view;
        
        public function __construct() {
            $this->model = new Model();
            $this->view = new View();
        }

        public function index() {

        }

    }