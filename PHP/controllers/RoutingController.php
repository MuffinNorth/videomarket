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
