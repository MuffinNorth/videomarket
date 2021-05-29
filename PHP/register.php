<?php
if(isset($_POST['registerData'])){
    $login = $_POST['registerData']['login'];
    $name = $_POST['registerData']['name'];
    $lname = $_POST['registerData']['lname'];
    $email = $_POST['registerData']['email'];
    $phone = $_POST['registerData']['phone'];
    $passport = $_POST['registerData']['passport'];
    $addres = $_POST['registerData']['addres'];
    $password = $_POST['registerData']['password'];
    $password = password_hash($password, PASSWORD_BCRYPT);
    $fname = $name . " " . $lname;
    $sql = "INSERT INTO `client` (`Full_name`, `Passport`, `Phone_number`, `Adress`, `login`, `password`, `role`) VALUES ('$fname', '$passport', '$phone', '$addres', '$login', '$password', '0')";
    $res = $mysqli->query($sql);
    echo $res;
}