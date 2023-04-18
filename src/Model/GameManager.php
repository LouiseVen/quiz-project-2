<?php

namespace App\Model;

use App\Model\Entity\Questions;
use App\Model\Entity\Themes;
use PDO;

class GameManager extends AbstractManager
{
    public function selectByTheme(int $id): array
    {
        $statement = $this->pdo->query("SELECT * FROM " . QuestionManager::TABLE . " AS q INNER JOIN " . ThemeManager::TABLE . " AS t ON 't.id' = q.theme_id WHERE t.id=:id ");
        // $statement = $this->pdo->prepare("SELECT * FROM " . QuestionManager::TABLE . "WHERE theme_id = :theme_id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);


        return $statement->fetchAll(PDO::FETCH_CLASS, Questions::class);
    }
}
