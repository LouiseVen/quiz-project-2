<?php

namespace App\Controller;

use App\Model\GameManager;

class GameController extends AbstractCOntroller
{
    public function play(string $name): string
    {
        $gameManager = new GameManager();
        $parameters = [
            'question' => $gameManager->getGame($name),
        ];
        return $this->twig->render('Theme/game.html.twig', $parameters);
    }
}
