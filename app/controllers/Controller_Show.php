<?php

    namespace App\controllers;
    use App\core\Controller;
    
    class Controller_Show extends Controller 
    {
        protected $data;

        function index() { 
            $this->view->generate('view_show.php', 'view_template.php'); 
        }

        function display($data) {
            $this->view->generate('view_show.php', 'view_template.php', $data[0]); 
        }
    }