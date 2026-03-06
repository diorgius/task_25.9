<?php

    namespace App\data;
    use PDO;

    try {
        $pdo = new PDO('sqlite:' . DATA . 'db.sqlite');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 
        "create table if not exists users (
        id integer primary key autoincrement,
        login varchar(64) not null,
        email varchar(64) not null,
        password varchar(128) not null,
        created datetime default current_timestamp)";

    $pdo->exec($sql);

    $sql = 
        "create table if not exists comments (
        id integer primary key autoincrement,
        user_id integer,
        file varchar(128) not null,
        created datetime default current_timestamp,
        comment varchar(512) not null,
        foreign key (user_id) references users (id))";

    $pdo->exec($sql);

    } catch(PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    $pdo = null;

    class DB
    {
        protected $pdo;

        public function __construct() {  
            try {  
                $this->pdo = new PDO('sqlite:' . DATA . 'db.sqlite');
            } catch (PDOException $e) {  
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }  
        }
        
        public function createUser(array $credentials, string $table) {
            $login = $credentials['login'];
            $email = $credentials['email'];
            $password = password_hash($credentials['password'], PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("INSERT INTO $table (login,email,password) values (:login,:email,:password)");
            $stmt->execute([':login' => $login, 
                            ':email' => $email, 
                            ':password' => $password]);
            return true;
        }

        public function createComment(array $commentData, string $table) {
            $userId = $commentData['userId'];
            $picture = $commentData['file'];
            $comment = $commentData['comment'];
            $stmt = $this->pdo->prepare("INSERT INTO $table (user_id,file,comment) values (:userId,:file,:comment)");
            $stmt->execute([':userId' => $userId, 
                            ':file' => $picture, 
                            ':comment' => $comment]);
            return true;
        }

        function getUserByProp(string $value, string $prop, string $table){
            $stmt = $this->pdo->prepare("SELECT id,login,password FROM $table WHERE $prop = :value");
            $stmt->execute([':value' => $value]); 
            return $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        function getCommentByProp(string $value, string $prop, string $table){
            $stmt = $this->pdo->prepare("SELECT c.*,u.login FROM $table as c LEFT JOIN users as u on c.user_id = u.id WHERE $prop = :value");
            $stmt->execute([':value' => $value]); 
            return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function deleteByProp(string $value, string $prop, string $table) {
            $stmt = $this->pdo->prepare("DELETE FROM $table WHERE $prop = :value");
            $stmt->execute([':value' => $value]); 
            return true;
        }        

        public function getAll(string $table) {
            $stmt = $this->pdo->query("SELECT * FROM $table");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


    }