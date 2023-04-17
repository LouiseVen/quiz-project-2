<?php

namespace App\Model;

use PDO;

class AnswerManager extends AbstractManager
{
    public const TABLE = 'answers';

    public function insertTrueAnswer(array $trueAnswer): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`value`, `is_true`) VALUES (:value, 1)");
        $statement->bindValue('value', $trueAnswer['value'], PDO::PARAM_STR);
        $statement->bindValue('is_true', $trueAnswer['is_true'], PDO::PARAM_INT);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
