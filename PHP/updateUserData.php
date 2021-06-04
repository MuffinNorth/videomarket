<?php
require_once "./PHP/dbconnect.php";
$name = $_GET['name'];
$username = $_GET['username'];
$passport = $_GET['passport'];
$phone = $_GET['phone'];
$address = $_GET['addres'];
$password = $_GET['password'];
$sql = "";
if(isset($password)){
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "UPDATE `client` SET `Full_name` = '$name', `Passport` = '$passport', `Phone_number` = '$phone', `Adress` = '$address', `Password` = '$password' WHERE `client`.`login` = '$username'";
}else{
    $sql = "UPDATE `client` SET `Full_name` = '$name', `Passport` = '$passport', `Phone_number` = '$phone', `Adress` = '$address' WHERE `client`.`login` = '$username'";
}
$res = $mysqli->query($sql);
echo "true";
