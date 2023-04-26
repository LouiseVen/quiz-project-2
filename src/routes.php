<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/game/edit?id=1' will execute $gameController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'games' => ['GameController', 'index',],
    'themes' => ['GameController', 'themeSelection', ['id']],
    'themeselected' => ['GameController', 'themeSelected', ['id', 'questionId', 'answerId']],
    'results' => ['GameController', 'getScore', ['rightAnswer']],
    'games/delete' => ['GameController', 'delete',],
    'login' => ['UserController', 'login', ['email']],
    'logout' => ['UserController', 'logout',],
    'register' => ['UserController', 'register',],
    'account' => ['UserController', 'show', ['user']],
];
