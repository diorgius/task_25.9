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
                $user = $this->model->login($credentials);
                if($user){
                    session_start();
                    $_SESSION['auth'] = true;
                    $_SESSION['login'] = $user['login'];
                    header('location: /');
                    exit();
                } else {
                    $data = 'badlogin';
                    $this->view->generate('view_login.php', 'view_template.php', $data); 
                    // header('location: /login');
                    // exit();    
                }          
            }    
        }

        public function signout() {
            session_start();
            unset($_SESSION['auth']);
            unset($_SESSION['login']);
            session_destroy();
            header('location: /');
            exit();
        }
    }