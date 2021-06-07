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
        "role" => 0,
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
    }else if($URI[1] == 'returnMovie'){
        include_once "./PHP/returnRent.php";
    }else if($URI[1] == 'getUser'){
        include_once "./PHP/getUserData.php";
    }else if($URI[1] == 'updateUserData'){
        include_once "./PHP/updateUserData.php";
    }else if($URI[1] == 'updateOrAddFilm'){
        include_once "./PHP/updateOrAddFilm.php";
    }else if($URI[1] == 'updateOrAddStudio'){
        include_once "./PHP/updateOrAddStudio.php";
    }else if($URI[1] == 'updateOrAddActor'){
        include_once "./PHP/updateOrAddActor.php";
    }else if($URI[1] == "delMovie"){
        include_once "./PHP/delMovie.php";
    }else if($URI[1] == "delStudio"){
        include_once "./PHP/delStudio.php";
    }else if($URI[1] == "delActor"){
        include_once "./PHP/delActor.php";
    }else if($URI[1] == "updateOrAddCast"){
        include_once "./PHP/updateOrAddCast.php";
    }else if($URI[1] == "delCast"){
        include_once "./PHP/delCast.php";
    }
}