<?php

namespace App\Model;

use App\Model\Entity\Questions;
use App\Model\Entity\Themes;
use PDO;

class GameManager extends AbstractManager
{
    public function getGame(int $theme_id): ?Questions
    {
        // $statement = $this->pdo->prepare("SELECT * FROM " . QuestionManager::TABLE . "AS q INNER JOIN " . ThemeManager::TABLE . " AS t ON 't.id' = q.theme_id WHERE name=:name");
        $statement = $this->pdo->prepare("SELECT * FROM " . QuestionManager::TABLE . "WHERE theme_id = :theme_id");
        $statement->bindValue('theme_id', $theme_id, \PDO::PARAM_INT);
        $statement->setFetchMode(PDO::FETCH_CLASS, Questions::class);
        $statement->execute();

        return $statement->fetch();
    }
}
