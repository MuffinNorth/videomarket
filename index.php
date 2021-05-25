<?php
require_once "./PHP/controllers/LoginController.php";
require_once "./PHP/controllers/ViewController.php";
$data = array(
    "title" => "Домашняя страница",
);
getView("index", $data);

