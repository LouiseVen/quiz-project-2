<?php

namespace App\Controller;

use App\Model\AnswerManager;

class AnswerController extends AbstractController
{
    public function index(): string
    {
        $answerManager = new AnswerManager();
        $answers = $answerManager->selectAll('value');

        return $this->twig->render('Theme/index.html.twig', ['answers' => $answers]);
    }
}
