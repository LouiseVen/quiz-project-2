<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function login(): string
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userManager = new UserManager();

            $credentials = array_map('trim', $_POST);

            $user = $userManager->selectOneByEmail($credentials['email']);

            if ($user && password_verify($credentials['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /');
                exit();
            }
        }
        return $this->twig->render('User/login.html.twig');
    }


    public function logout()
    {
    }

    public function register(): string
    {
        return $this->twig->render('User/register.html.twig');
    }
}
