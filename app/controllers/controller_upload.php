<?php
    class Controller_Upload extends Controller 
    { 
        function action_index() { 
            $this->view->generate('view_upload.php', 'view_template.php'); 
        } 
    }