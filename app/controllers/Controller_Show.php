<?php

    namespace App\controllers;
    use App\core\Controller;
    use App\core\Model;
    use App\models\Model_Show;
    use App\core\View;

    class Controller_Show extends Controller 
    {
        protected $model;
        
        public function display(array $data) {
            $file = $data[0];
            $this->model = new Model_Show();
            $comments = $this->model->showComment($file);
            $data = ['file' => $file,
                     'comments' => $comments];
            $this->view->generate('view_show.php', 'view_template.php', $data);
        }
            
        public function comment(array $data) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $file = $data[0];
                session_start();
                $commentData = ['userId' => $_SESSION['userId'], 
                                'file' => $file, 
                                'comment' => $_POST['comment']];
                $this->model = new Model_Show();
                $result = $this->model->addComment($commentData);

                if($result) {
                    header('location: /show/display/' . $file);
                    exit();
                }
            }  
        }
    }