<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'themes' => ['ThemeController', 'index',],
    'items/edit' => ['ThemeController', 'edit', ['id']],
    'items/show' => ['ThemeController', 'show', ['id']],

    'items/delete' => ['ThemeController', 'delete',],
    'items/game' => ['ThemeController', 'game',],
    'questions' => ['QuestionController', 'indexQuestions',],
    'questions/show' => ['QuestionController', 'show', ['id']],

    'questions/add' => ['QuestionController', 'add',],
];
