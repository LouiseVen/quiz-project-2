<?php

namespace App\Controller;

use App\Model\QuestionManager;

class QuestionController extends AbstractController
{
    /**
     * List items
     */
    public function index(): string
    {
        $questionManager = new QuestionManager();
        $questions = $questionManager->selectAll('value');

        return $this->twig->render('Item/index.html.twig', ['questions' => $questions]);
    }

    // public function select(): string
    // {
    //     // $itemManager = new ItemManager();
    //     // $items = $itemManager->selectAll('title');

    //     return $this->twig->render('Item/select.html.twig');
    // }

    /**
     * Show informations for a specific item
     */
    public function show(int $id): string
    {
        $questionManager = new QuestionManager();
        $question = $questionManager->selectOneById($id);

        return $this->twig->render('Item/show.html.twig', ['question' => $question]);
    }

    /**
     * Edit a specific item
     */
    // public function edit(int $id): ?string
    // {
    //     $itemManager = new ItemManager();
    //     $item = $itemManager->selectOneById($id);

    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         // clean $_POST data
    //         $item = array_map('trim', $_POST);

    //         // TODO validations (length, format...)

    //         // if validation is ok, update and redirection
    //         $itemManager->update($item);

    //         header('Location: /items/show?id=' . $id);

    //         // we are redirecting so we don't want any content rendered
    //         return null;
    //     }

    //     return $this->twig->render('Item/edit.html.twig', [
    //         'item' => $item,
    //     ]);
    // }

    /**
     * Add a new item
     */
    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $question = array_map('trim', $_POST);
            // $theme = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $questionManager = new QuestionManager();
            $id = $questionManager->insert($question);

            header('Location:/questions/show?id=' . $id);
            return null;
        }

        return $this->twig->render('Item/addQuestion.html.twig');
    }

    /**
     * Delete a specific item
     */
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $questionManager = new QuestionManager();
            $questionManager->delete((int)$id);

            header('Location:/items');
        }
    }
}
