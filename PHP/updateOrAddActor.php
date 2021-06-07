<?php
require_once "./PHP/dbconnect.php";
global $mysqli;
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $country = $_POST['country'];
    $sql = "UPDATE `actor` SET `Full_name` = '$name', `Country` = '$country' WHERE `actor`.`ID` = $id";
    $r = $mysqli->query($sql);
}else{
    $name = $_POST['name'];
    $country = $_POST['country'];
    $sql = "INSERT INTO `actor` (`ID`, `Full_name`, `Country`) VALUES (NULL, '$name', '$country')";
    $r = $mysqli->query($sql);
}
header("location:/aActorList");