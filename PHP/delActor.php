<?php
if(isset($_GET['id'])){
    require_once "./PHP/dbconnect.php";
    global $mysqli;
    $id = $_GET['id'];
    $sql = "DELETE FROM `actor` WHERE `actor`.`ID` = $id";
    $mysqli->query($sql);
}