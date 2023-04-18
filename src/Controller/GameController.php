<?php

namespace App\Controller;

use App\Model\GameManager;

class GameController extends AbstractCOntroller
{
    public function questionsByTheme(int $id = 1)
    {
        $gameManager = new GameManager();
        $questions = $gameManager->selectByTheme($id);
        // $parameters = [
        //     'questions' => $gameManager->getGame($theme_id),
        // ];
        var_dump($questions);
        die();
        return $this->twig->render('Theme/game.html.twig', ['questions' => $questions]);
    }
}
