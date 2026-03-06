<?php

    namespace App\controllers;
    use App\core\Controller;
    use App\core\Model;
    use App\models\Model_Upload;
    use App\core\View;
    
    class Controller_Upload extends Controller 
    {
        protected $model;
         
        public function index() { 
            $this->view->generate('view_upload.php', 'view_template.php'); 
        } 

        public function load() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $files = $_FILES;
                $this->model = new Model_Upload();
                $result = $this->model->loading($files);

                if(!$result){
                    header('location: /');
                    exit();
                } else {
                    $data = $result;
                    $this->view->generate('view_upload.php', 'view_template.php', $data); 
                }     
            }    
        }
    }