<?php
session_start();
require_once "./PHP/dbconnect.php";
if(!isset($_SESSION["logindata"])){
    $_SESSION["logindata"] = array(
        "isLogin" => false,
        "username" => "guest",
        "session_key" => "000000"
    );
}