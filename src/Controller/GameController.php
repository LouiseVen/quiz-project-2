<?php

namespace App\Controller;

use App\Model\GameManager;
use App\Model\Entity\Questions;

class GameController extends AbstractController
{
    /**
     * List games
     */
    public function index(): string
    {
        $gameManager = new GameManager();
        $games = $gameManager->selectAll('title');

        return $this->twig->render('Game/index.html.twig', ['games' => $games]);
    }


    /**
     * Show informations for a specific game
     */
    public function show(int $id): string
    {
        $gameManager = new GameManager();
        $game = $gameManager->selectOneById($id);

        return $this->twig->render('Game/show.html.twig', ['game' => $game]);
    }


    /**
     * Edit a specific game
     */
    public function edit(int $id): string
    {
        $gameManager = new GameManager();
        $game = $gameManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $game = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $gameManager->update($game);
            header('Location: /games/show?id=' . $id);
        }

        return $this->twig->render('Game/edit.html.twig', [
            'game' => $game,
        ]);
    }


    /**
     * Add a new game
     */
    public function add(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $game = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $gameManager = new GameManager();
            $id = $gameManager->insert($game);
            header('Location:/games/show?id=' . $id);
        }

        return $this->twig->render('Game/add.html.twig');
    }


    /**
     * Delete a specific game
     */
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $gameManager = new GameManager();
            $gameManager->delete((int)$id);
            header('Location:/games');
        }
    }

    public function themeSelection() {
        $gameManager = new GameManager();
        $themes = $gameManager->getAllThemes();

        return $this->twig->render('Game/selectTheme.html.twig', ['themes' => $themes]);
    }

    public function themeSelected(int $theme_id)
    {
        $gameManager = new GameManager();
        $questions = $gameManager->getQuestions($theme_id);
        $answers = [];
        foreach ($questions as $key  => $value) {
            // foreach ($value as $question) {
            //     $question_id = $question->getId();
            //     $answers = $gameManager->getAnswers($question_id);
            // }
            $questions[$key]['answers'] = $gameManager->GetAnswers($value['id']);
        }

        return $this->twig->render('Game/game.html.twig', ['questions' => $questions, 'answers' => $answers] );
    }
}
