<?php

namespace App\Controller;

use App\Model\ThemeManager;

class ThemeController extends AbstractController
{
    /**
     * List items
     */
    public function index(): string
    {
        $itemManager = new ThemeManager();
        $themes = $itemManager->selectAll('name');

        return $this->twig->render('Theme/select.html.twig', ['themes' => $themes]);
    }


    /**
     * Show informations for a specific item
     */
    public function show(int $id): string
    {
        $themeManager = new ThemeManager();
        $theme = $themeManager->selectOneById($id);

        return $this->twig->render('Theme/show.html.twig', ['theme' => $theme]);
    }

    public function selectByName(string $name): string
    {
        $themeManager = new ThemeManager();
        $theme = $themeManager->selectByName($name);

        return $this->twig->render('Theme/game.html.twig', ['theme' => $theme]);
    }
    /**
     * Edit a specific item
     */
    public function edit(int $id): ?string
    {
        $itemManager = new ThemeManager();
        $item = $itemManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $item = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $itemManager->update($item);

            header('Location: /items/show?id=' . $id);

            // we are redirecting so we don't want any content rendered
            return null;
        }

        return $this->twig->render('Theme/edit.html.twig', [
            'item' => $item,
        ]);
    }

    /**
     * Add a new item
     */
    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $item = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $itemManager = new ThemeManager();
            $id = $itemManager->insert($item);

            header('Location:/items/show?id=' . $id);
            return null;
        }

        return $this->twig->render('Theme/add.html.twig');
    }

    /**
     * Delete a specific item
     */
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $itemManager = new ThemeManager();
            $itemManager->delete((int)$id);

            header('Location:/items');
        }
    }

    public function game(): string
    {
        return $this->twig->render('Theme/game.html.twig');
    }
}
