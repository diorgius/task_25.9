<?php
    class Controller_Main extends Controller 
    { 
        function action_index() { 
            $this->view->generate('view_showlist.php', 'view_template.php'); 
        } 
    }