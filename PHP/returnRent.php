<?php
require_once "./PHP/dbconnect.php";
if(isset($_POST['who']) and isset($_POST['date'])){
    global $mysqli;
    $id = $_POST['who'];
    $when = $_POST['date'];
    $sql = "UPDATE `rent` SET `Date_in`='$when' WHERE ID = '$id';";
    $mysqli->query($sql);
}
echo 'false';