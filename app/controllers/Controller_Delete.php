<?php

    namespace App\controllers;
    use App\core\Controller;
    use App\core\Model;
    use App\models\Model_Delete;
    use App\core\View;

    class Controller_Delete extends Controller 
    { 
        public function index() { 
            $this->view->generate('view_showlist.php', 'view_template.php'); 
        } 

        public function deleteFile() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $fileName = $_POST['file'];
                $this->model = new Model_Delete();
                $result = $this->model->delete($fileName);

                if($result) {
                    header('location: /');
                    exit();
                }
            }
        }
    }