<?php

    namespace App\controllers;
    use App\core\Controller;
    use App\core\Model;
    use App\models\Model_Registration;
    use App\core\View;

    class Controller_Registration extends Controller 
    { 
        public function index() { 
            $this->view->generate('view_registration.php', 'view_template.php'); 
        }
                
        public function signup() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $credentials = $_POST;
                $this->model = new Model_Registration();
                $result = $this->model->registration($credentials);

                if(!array_key_exists(0, $result)){
                    session_start();
                    $_SESSION['auth'] = true;
                    $_SESSION['userId'] = $result['id'];
                    $_SESSION['login'] = $result['login'];
                    header('location: /');
                    exit();
                } else {
                    $data = $result;
                    $this->view->generate('view_registration.php', 'view_template.php', $data); 
                }          
            }    
        }
    }