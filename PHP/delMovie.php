<?php
if(isset($_GET['id'])){
    require_once "./PHP/dbconnect.php";
    global $mysqli;
    $id = $_GET['id'];
    $sql = "DELETE FROM `film` WHERE `film`.`ID` = '$id'";
    $mysqli->query($sql);
}