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
    ],
    "movies" => [
        'view' => "aboutMovie",
        'title' => "Подробнее об фильме",
        'inNavBar' => '0'
    ],
    "adminAddStudio" =>[
        'view' => "adminAddStudio",
        'title' => "Создать или редактировать студию",
        'inNavBar' => '0'
    ],
    "aActorList" =>[
        'view' => "aActorList",
        'title' => "Админская панель - актеры",
        'inNavBar' => 4
    ],
    "aRentList" =>[
        'view' => "aRentList",
        'title' => "Админская панель - аренды",
        'inNavBar' => 6
    ],
    "aUserList" =>[
        'view' => "aUserList",
        'title' => "Админская панель - пользователи",
        'inNavBar' => 7
    ],
    "aCList" =>[
        'view' => "aCastList",
        'title' => "Админская панель - актерский состав",
        'inNavBar' => 5
    ],
    "adminAddActor" => [
        'view' => "adminAddActor",
        'title' => "Создать или редактировать актера",
        'inNavBar' => 0
    ],
    "actor" => [
        'view' => "aboutActor",
        'title' => "Про актера",
        'inNavBar' => 0
    ],
    "adminAddCast" => [
        'view' => "adminAddCast",
        'title' => "Создать или редактировать связь между актером и фильмами",
        'inNavBar' => 0
    ],
    "paymentPage" => [
        'view' => "paymentPage",
        'title' => "Опалата аренды",
        'inNavBar' => 0
    ]
    
);