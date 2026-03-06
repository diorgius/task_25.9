<?php

    namespace App\controllers;
    use App\core\Controller;
    use App\core\Model;
    use App\models\Model_Delete;
    use App\core\View;

    class Controller_Delete extends Controller 
    { 
        public function deleteFile() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $file = $_POST['file'];
                $this->model = new Model_Delete();
                $result = $this->model->deleteFile($file);

                if($result) {
                    header('location: /');
                    exit();
                }
            }
        }

        public function deleteComment($data) {
            $file = $data[0];
            $commentId = $data[1];
            $this->model = new Model_Delete();
            $result = $this->model->deleteComment($commentId);

            if($result) {
                header('location: /show/display/' . $file);
                exit();
            }
        }
    }