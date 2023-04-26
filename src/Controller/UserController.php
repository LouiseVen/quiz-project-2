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

            // var_dump($credentials);
            // die();

            $user = $userManager->selectOneByEmail($credentials['email']);

            if ($user && password_verify($credentials['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /account');
                exit();
            }
        }
        return $this->twig->render('User/login.html.twig');
    }


    public function logout()
    {
        session_destroy();
        header('Location: /');
    }

    public function register(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //TODO Add your code here to create a new accessory
            $user = array_map('trim', $_POST);

            $userManager = new UserManager();
            $userManager->insert($user);
            header('Location:/login');
        }

        return $this->twig->render('User/register.html.twig');
    }

    public function show()
    {
        $userManager = new UserManager();
        $user = $userManager->selectAll();


        return $this->twig->render('User/account.html.twig', ['user' => $user]);
    }
}
