<?php
require_once "./config/dbconfig.php";
try {
    $dbh = new PDO("pgsql:host=$host;port=5432;dbname=$dbname;user=$user;password=$password");
 }
 catch(PDOException $e)
 {
       echo $e->getMessage();
 }