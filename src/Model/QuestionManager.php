<?php

namespace App\Model;

use PDO;

class QuestionManager extends AbstractManager
{
    public const TABLE = 'questions';


    /**
     * Insert new item in database
     */
    // public function insert(array $question): int
    // {
    //     $statement = $this->pdo->prepare(
    //         "INSERT INTO " . self::TABLE . " (`value`, `theme_id`) VALUES (:value, :theme_id)"
    //     );
    //     $statement->bindValue('value', $question['value'], PDO::PARAM_STR);
    //     $statement->bindValue('theme_id', $question['theme_id'], PDO::PARAM_INT);

    //     $statement->execute();
    //     return (int)$this->pdo->lastInsertId();
    // }

    public function insert(array $question): int
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO " . self::TABLE . " (`value`, `theme_id`) VALUES (:value, :theme_id)"
        );
        $statement->bindValue(':value', $question['value'], PDO::PARAM_STR);
        $statement->bindValue(':theme_id', $question['theme_id'], PDO::PARAM_INT);

        $statement->execute();
        $questionId = (int)$this->pdo->lastInsertId();

        $answerManager = new AnswerManager();

        // Insérer les réponses dans la table 'answers'
        foreach ($question['answers'] as $answer) {
            $is_true = isset($answer['is_true']) && $answer['is_true'] == '1' ? 1 : 0;

            $statement = $this->pdo->prepare(
                "INSERT INTO " . AnswerManager::TABLE . " (`question_id`, `value`, `is_true`) VALUES (:question_id, :value, :is_true)"
            );
            $statement->bindValue(':question_id', $questionId, PDO::PARAM_INT);
            $statement->bindValue(':value', $answer['value'], PDO::PARAM_STR);
            $statement->bindValue(':is_true', $is_true, PDO::PARAM_INT);
            $statement->execute();
        }

        return $questionId;
    }

    /**
     * Update item in database
     */
    // public function update(array $question): bool
    // {
    //     $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `value` = :value WHERE id=:id");
    //     $statement->bindValue('id', $question['id'], PDO::PARAM_INT);
    //     $statement->bindValue('value', $question['value'], PDO::PARAM_STR);

    //     return $statement->execute();
    // }

    public function selectByTheme(int $themeId): array
    {
        // $themeManager = new ThemeManager();
        // $themeId = $themeManager->selectOneById($themeId);

        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE theme_id= :id");

        $statement->bindValue('id', $themeId, \PDO::PARAM_INT);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
