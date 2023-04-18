<?php

namespace App\Model;

use App\Model\Entity\Questions;
use App\Model\Entity\Theme;
use PDO;

class GameManager extends AbstractManager
{
    public function getGame(string $name): ?Questions
    {
        // $statement = $this->pdo->prepare("SELECT * FROM " . QuestionManager::TABLE . "AS q INNER JOIN " . ThemeManager::TABLE . " AS t ON 't.id' = q.theme_id WHERE name=:name");
        $statement = $this->pdo->prepare("SELECT * FROM " . QuestionManager::TABLE . "WHERE theme_id= 1");
        $statement->bindValue('name', $name, \PDO::PARAM_STR);
        $statement->setFetchMode(PDO::FETCH_CLASS, Questions::class);
        $statement->execute();

        return $statement->fetch();
    }
}
