<?php
require_once "./PHP/dbconnect.php";
global $mysqli;
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $country = $_POST['country'];
    $sql = "UPDATE `studio` SET `Name` = '$name', `Country` = '$country' WHERE `studio`.`ID` = $id";
    $r = $mysqli->query($sql);
}else{
    $name = $_POST['name'];
    $country = $_POST['country'];
    $sql = "INSERT INTO `studio` (`ID`, `Name`, `Country`) VALUES (NULL, '$name', '$country')";
    $r = $mysqli->query($sql);
}
header("location:/aStudioList");