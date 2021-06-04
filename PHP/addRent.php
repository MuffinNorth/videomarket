<?php
require_once "./PHP/dbconnect.php";
if(isset($_POST['who']) and isset($_POST['what'])){
    global $mysqli;
    $who = $_POST['who'];
    $sql = "SELECT id FROM `client` WHERE login='$who'";
    echo $sql;
    $id = $mysqli->query($sql);
    $id = $id->fetch_assoc();
    $id = $id['id'];
    $what = $_POST['what'];
    $when = $_POST['date'];
    $sql = "INSERT INTO `rent` ( `ID_client`, `ID_film`, `Date_out`, `Date_in`) VALUES ('$id', '$what', '$when', NULL)";
    echo $sql;
    $mysqli->query($sql);
}
echo 'false';