<?php
if(isset($_POST['login']) and isset($_POST['password'])){
    $login = $_POST['login'];
    $sql = "SELECT `password` FROM `client` WHERE `login`='$login'";
    $res = $mysqli->query($sql);
    $res = $res->fetch_assoc();
    if(password_verify($_POST['password'], $res['password'])){
        $_SESSION["logindata"] = array(
            "isLogin" => true,
            "username" => $login,
            "session_key" => "000000"
        );
        header('Location: /');
    }
    else{
        header('Location: /login');
    }
}
else{
    header('Location: /login');
}