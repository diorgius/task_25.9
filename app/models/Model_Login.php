<?php    

    namespace App\models;
    use App\core\Model;
    use App\data\DB;

    class Model_Login extends Model
    {
        public function login($credentials) {

            $user = (new DB())->getUser($credentials, 'users');
            if($user){
                return $user;
            } else {
                return false;
            }

        }

    }