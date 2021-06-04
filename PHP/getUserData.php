<?php
require_once "./PHP/dbconnect.php";
if(isset($_GET['username'])){
    $login = $_GET['username'];
    $sql = "SELECT * FROM `client` WHERE client.login = '$login'";
    echo $sql;
    $res = $mysqli->query($sql);
    echo json_encode($res->fetch_assoc(), JSON_UNESCAPED_UNICODE);
}else{
    echo "false";
}