<?php

namespace App\Model;

use PDO;

class AnswerManager extends AbstractManager
{
    public const TABLE = 'answers';

    public function insert(array $answer, int $question_id): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`value`, `is_true`, `question_id`) 
                                      VALUES (:value, :is_true, :question_id)");
        $statement->bindValue('value', $answer['value'], PDO::PARAM_STR);
        $statement->bindValue('is_true', $answer['is_true'], PDO::PARAM_BOOL);
        $statement->bindValue('question_id', $question_id, PDO::PARAM_INT);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
