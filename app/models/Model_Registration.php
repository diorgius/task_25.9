<?php    

    namespace App\models;
    use App\core\Model;
    use App\data\DB;

    class Model_Registration extends Model
    {
        public function registration($credentials) {
            $login = trim($credentials['login']);
            $email = trim($credentials['email']);
            $password = trim($credentials['password']);
            $passwordagain = trim($credentials['passwordagain']);

            $result = [];

            if(!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
                $result [] = "Логин может состоять только из букв английскго алфавита и цифр";
            }

            if((strlen($login) < 3 || strlen($login) > 30)) {
                $result [] = "Логин должен быть не меньше 3-х символов и не больше 30";
            }

            if((strlen($password) < 8 || strlen($password) > 20)) {
                $result [] = "Пароль должен быть не меньше 8-ми символов и не больше 20";
            }

            if($password !== $passwordagain) {
                $result [] = "Пароли не совпадают";
            }

            $user = (new DB())->getUserProp($login, 'login', 'users');
            
            if($user) {
                $result [] = "Такой пользователь уже существует";
            } 

            if(count($result) == 0) {
                $user = (new DB())->createUser($credentials, 'users');
                $credentials = ['login' => $login, 
                                'password' => $password];
                $login = new Model_Login();
                $result = $login->login($credentials);
                return $result;
            } else {
               return $result;
            }       
        }
    }