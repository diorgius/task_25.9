<?php    

    namespace App\models;
    use App\core\Model;
    use App\data\DB;

    session_start();

    class Model_Login extends Model
    {
        public function login($credentials) {

            $user = (new DB())->getUser($credentials, 'users');

            if(!$user){
                $user = (new DB())->createUser($credentials, 'users');
                $_SESSION['auth'] = true;
                $_SESSION['login'] = $credentials['login'];
                header('location: /');
            } else {
                $_SESSION['auth'] = true;
                $_SESSION['login'] = $credentials['login'];
                header('location: /');
            }

        }

    	public function logout() {	
            unset($_SESSION['auth']);
            unset($_SESSION['login']);
            session_destroy();
            header('location: /');
	    }

    }