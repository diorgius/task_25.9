<?php

    namespace App\controllers;
    use App\core\Controller;
    use App\core\Model;
    use App\models\Model_Main;
    use App\core\View;

    class Controller_Main extends Controller 
    { 
        public function index() { 
            $this->model = new Model_Main();
            $data = $this->model->getData();
            $this->view->generate('view_showlist.php', 'view_template.php', $data); 
        } 
    }