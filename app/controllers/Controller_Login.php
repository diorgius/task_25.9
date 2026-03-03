<?php

    namespace App\controllers;
    use App\core\Controller;
    use App\core\Model;
    use App\models\Model_Login;
    use App\core\View;
    class Controller_Login extends Controller 
    { 
        public function index() { 
            $this->view->generate('view_login.php', 'view_template.php'); 
        }
                
        public function singup() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $credentials = $_POST;
                $this->model = new Model_Login();
                $this->model->login($credentials);
            }    
        }

        public function signout() {
            $this->model = new Model_Login();
            $this->model->logout();
        }
    }