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
        email varchar(128) not null,
        password varchar(128) not null,
        created datetime default current_timestamp)";

    $pdo->exec($sql);

    $sql = 
        "create table if not exists comments (
        id integer primary key autoincrement,
        user_id integer,
        picture varchar(64) not null,
        created datetime default current_timestamp,
        comment varchar(1024) not null,
        foreign key (user_id) references users (id))";

    $pdo->exec($sql);

    } catch(PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    $pdo = null;

    class DB
    {

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
            return;
        }

        function getUserProp(string $value, string $prop, string $table){
            $stmt = $this->pdo->prepare("SELECT id,login,password FROM $table WHERE $prop = :value");
            $stmt->execute([':value' => $value]); 
            return $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        public function getAll(string $table) {
            $stmt = $this->pdo->query("SELECT * FROM $table");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


    }