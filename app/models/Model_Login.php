<?php    

    namespace App\models;
    use App\core\Model;
    use App\data\DB;

    class Model_Login extends Model
    {
        public function login($credentials) {

            // $user = (new DB())->getUser($credentials, 'users');
            // if($user){
            //     return $user;
            // } else {
            //     return false;
            // }
            
            $login = $credentials['login'];
            $password = $credentials['password'];
            $user = (new DB())->getUserProp($login, 'login', 'users');
            if($user){
                if(password_verify($password, $user['password'])) {
                    return $user;
                } else {
                    return false;
                }

            } else {
                $user = (new DB())->createUser($credentials, 'users');
                return $user;
                // return false;
            }
            

        }

    }