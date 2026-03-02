<?php

    namespace App\controllers;
    use App\core\Controller;
    
    class Controller_Upload extends Controller 
    { 
        function index() { 
            $this->view->generate('view_upload.php', 'view_template.php'); 
        } 
    }