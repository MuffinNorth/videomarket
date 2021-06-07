<?php
require_once "./PHP/dbconnect.php";
global $mysqli;
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $studio = $_POST['studio'];
    $syn = $_POST['syn'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $sql = "UPDATE `film` SET `Title` = '$title', `Genre` = '$genre', `Director` = '$director', `Year_production` = '$year', `Price` = '$price', `synopsis` = '$syn' WHERE `film`.`ID` = '$id'";
    $r = $mysqli->query($sql);
}else{
$title = $_POST['title'];
$genre = $_POST['genre'];
$director = $_POST['director'];
$studio = $_POST['studio'];
$syn = $_POST['syn'];
$year = $_POST['year'];
$price = $_POST['price'];
$sql = "INSERT INTO `film` (`ID`, `ID_studio`, `Title`, `Genre`, `Director`, `Year_production`, `Price`, `synopsis`) VALUES (NULL, '$studio', '$title', '$genre', '$director', '$year', '$price', '$syn')";
$r = $mysqli->query($sql);
}
header("location:/aMovieList");