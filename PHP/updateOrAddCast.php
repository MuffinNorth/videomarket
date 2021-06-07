<?php
require_once "./PHP/dbconnect.php";
global $mysqli;
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $film = $_POST['film'];
    $actor = $_POST['actor'];
    $type = $_POST['type'];
    $sql = "UPDATE `cast` SET `ID_film` = '$film', `ID_actor` = '$actor', `Type` = '$type' WHERE `cast`.`ID` = $id ";
    $r = $mysqli->query($sql);
}else{
    $film = $_POST['film'];
    $actor = $_POST['actor'];
    $type = $_POST['type'];
    $sql = "INSERT INTO `cast` (`ID`, `ID_film`, `ID_actor`, `Type`) VALUES (NULL, '$film', '$actor', '$type')";
    $r = $mysqli->query($sql);
}
header("location:/aCList");