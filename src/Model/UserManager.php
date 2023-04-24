<?php

namespace App\Model;

class UserManager extends AbstractManager {
    public const TABLE = '';

    public string $email;

    public function __construct() {
        parent::__construct();
    }

    public function selectOneByEmail(string $email)
    {
        $query=$this->pdo->prepare("SELECT * FROM user WHERE email=:email");
        $query->bindValue('email', $email['email'], \PDO::PARAM_STR);

        $query->execute();
        return $this->pdo->query($query)->fetch();
    }
    
}