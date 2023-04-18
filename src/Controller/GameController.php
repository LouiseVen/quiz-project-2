<?php

namespace App\Controller;

use App\Model\GameManager;

class GameController extends AbstractCOntroller
{
    public function play(int $theme_id): int
    {
        $gameManager = new GameManager();
        $parameters = [
            'questions' => $gameManager->getGame($theme_id),
        ];
        return $this->twig->render('Theme/game.html.twig', $parameters);
    }
}
