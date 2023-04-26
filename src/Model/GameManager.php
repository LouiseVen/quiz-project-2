<?php

namespace App\Model;
use App\Model\Entity\Questions;
use PDO;

class GameManager extends AbstractManager
{
    

    /**
     * Insert new question in database
     */
    public function insert(array $game): int
    {
        $statement = $this->pdo->prepare("INSERT INTO questions (`title`) VALUES (:title)");
        $statement->bindValue('title', $game['title'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update question in database
     */
    public function update(array $game): bool
    {
        $statement = $this->pdo->prepare("UPDATE question SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $game['id'], \PDO::PARAM_INT);
        $statement->bindValue('title', $game['title'], \PDO::PARAM_STR);

        return $statement->execute();
    }

    public function getAllThemes(): array
    {
        $query = 'SELECT * FROM themes';

        return $this->pdo->query($query)->fetchAll();
    }

    public function getQuestions(int $theme_id)
    {
        // $statement = $this->pdo->prepare("SELECT * FROM " . QuestionManager::TABLE . "AS q INNER JOIN " . ThemeManager::TABLE . " AS t ON 't.id' = q.theme_id WHERE name=:name");
        $statement = $this->pdo->prepare("SELECT * FROM questions WHERE theme_id = :theme_id");
        $statement->bindValue('theme_id', $theme_id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getAnswers($question_id)
    {
        if (empty($_SESSION['question-'.$question_id.'-answers'])) {
            $statement = $this->pdo->prepare("SELECT * FROM answers WHERE question_id = :question_id ORDER BY RAND()");
            $statement->bindValue('question_id', $question_id, \PDO::PARAM_INT);
            $statement->execute();
            $_SESSION['question-'.$question_id.'-answers'] = $statement->fetchAll();
        } 

        return $_SESSION['question-'.$question_id.'-answers'];
        


    }
}