<?php
$ROUTER = array(
    "/" => [
        'view' => "index",
        'title' => "Главная страница",
        'inNavBar' => '1'
    ],
    "login" => [
        'view' => "login",
        'title' => "Страница входа",
        'inNavBar' => '3'
    ],
    "logup" => [
        'view' => "logup",
        'title' => "Страница регистрации",
        'inNavBar' => '4'
    ],
    "list" => [
        'view' => "movieList",
        'title' => "Список фильмов",
        'inNavBar' => '2'
    ],
    "mylist" => [
        'view' => "mylist",
        'title' => 'Мой список фильмов',
        'inNavBar' => '3'
    ],
    "me" =>[
        'view' => "myProfile",
        'title' => 'Мой аккаунт',
        'inNavBar' => '4'
    ],
    "aMovieList" => [
        'view' => "aMovieList",
        'title' => 'Админская панель - фильмы',
        'inNavBar' => '2'
    ],
    "aStudioList" => [
        'view' => "aStudioList",
        'title' => 'Админская панель - студии',
        'inNavBar' => '3'
    ],
    "adminAddMovie" => [
        'view' => "adminAddMovie",
        'title' => "Создать или редактировать фильм",
        'inNavBar' => '0'
    ]
    
);