<?php    

    namespace App\models;
    use App\core\Model;
    use App\data\DB;

    class Model_Login extends Model
    {
        public function login(array $credentials) {
            $login = $credentials['login'];
            $password = $credentials['password'];
            $user = (new DB())->getUserByProp($login, 'login', 'users');
            if($user) {
                if(password_verify($password, $user['password'])) {
                    return $user;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }