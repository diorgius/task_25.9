<?php
    class Controller_Show extends Controller 
    {
        protected $data;

        function action_index($data) { 
            $this->view->generate('view_show.php', 'view_template.php', $data); 
        } 
    }