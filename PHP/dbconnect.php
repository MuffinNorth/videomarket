<?php
require_once "./config/dbconfig.php";
try {
      $mysqli = new mysqli($host, $username, $password, $dbname);
      $mysqli->set_charset("utf8");
}
catch(PDOException $e)
{
       echo $e->getMessage();
}