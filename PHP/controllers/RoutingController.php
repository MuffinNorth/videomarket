<?php
require_once "./PHP/controllers/ViewController.php";
require_once "./config/routing.php";
$URI = explode('/', trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/'));
if($URI[0] == ""){$URI[0]="/";}
foreach ($ROUTER as $key => $value) {
    if($URI[0] == $key){
        $data = array(
            "title" => $value['title'],
            'nowpage' => $value['inNavBar'],
        );
        getView($value['view'], $data);
        break;
    }
}
if($URI[0] == 'register'){
    include_once "./PHP/register.php";
}
if($URI[0] == 'log-in'){
    include_once "./PHP/login.php";
}
if($URI[0] == 'logout'){
    $_SESSION["logindata"] = array(
        "isLogin" => false,
        "username" => "guest",
        "session_key" => "000000"
    );
    header('Location: /');
}
if($URI[0] == 'studios'){
    $data = [
        "title" => 'Фильмы студии',
        "nowpage" => '0'
    ];
    getView('studios', $data);
}
if($URI[0] == 'api'){
    if($URI[1] == 'addMovie'){
        include_once "./PHP/addRent.php";
    }
}