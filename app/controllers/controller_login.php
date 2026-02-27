<?php
    class Controller_Login extends Controller 
    { 
        function action_index() { 
            $this->view->generate('view_login.php', 'view_template.php'); 
        } 
    }