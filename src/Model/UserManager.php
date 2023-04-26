<?php

namespace App\Model;

use PDO;

class UserManager extends AbstractManager {
    public const TABLE = 'users';

    public string $email;

    public function __construct() {
        parent::__construct();
    }

    public function selectOneByEmail(string $email)
    {
        $query=$this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE email=:email");
        
        $query->bindValue('email', $email, \PDO::PARAM_STR);

        $query->execute();
        return $query->fetch();
    }

    public function insert(array $user)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, `password`, `email`) VALUES (:name, :password, :email)");
        $statement->bindValue('name', $user['name'], PDO::PARAM_STR);
        $statement->bindValue('password', $user['password'], PDO::PARAM_STR);
        $statement->bindValue('email', $user['email'], PDO::PARAM_STR);

        $statement->execute();
    }
    
}