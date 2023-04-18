<?php

namespace App\Model;

use PDO;

class ThemeManager extends AbstractManager
{
    public const TABLE = 'themes';

    /**
     * Insert new item in database
     */
    public function insert(array $item): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`title`) VALUES (:title)");
        $statement->bindValue('title', $item['title'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function selectByName(string $theme)
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM " . self::TABLE . " WHERE `name` = :name"
        );
        $statement->bindValue('name', $theme['name'], PDO::PARAM_STR);

        return $statement->execute();
    }


    /**
     * Update item in database
     */
    public function update(array $item): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $item['id'], PDO::PARAM_INT);
        $statement->bindValue('title', $item['title'], PDO::PARAM_STR);

        return $statement->execute();
    }
}
