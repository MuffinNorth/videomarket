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
        'inNavBar' => '2'
    ]
    
);