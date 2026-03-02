<?php

    namespace App\controllers;
    use App\core\Controller;
    
    class Controller_Login extends Controller 
    { 
        function index() { 
            $this->view->generate('view_login.php', 'view_template.php'); 
        } 
    }