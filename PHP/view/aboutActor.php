<?php
require_once "./PHP/dbconnect.php";
global $mysqli;
global $URI;
if(isset($URI[1])){
    
    $id = $URI[1];
    $sql = "SELECT * FROM `actor` WHERE ID = '$id'";
    $res = $mysqli->query($sql);
    
    $res = $res->fetch_assoc();
}
?>
<div class="container">
<form class="row g-3 needs-validation" novalidate>
   <div class="col-md-1">
    <label for="validationCustom00" class="form-label">ID</label>
    <input type="text" class="form-control" name="id" id="validationCustom00" value="<?php 
        echo $URI[1];
    ?>" disabled required>
  </div>
  <div class="col-md-5">
    <label for="validationCustom01" class="form-label">Имя</label>
    <input type="text" class="form-control" name="title" id="validationCustom01" value="<?php
        echo $res['Full_name'];
    ?>" disabled required>
  </div>
  <div class="col-md-2">
    <label for="validationCustom02" class="form-label">Страна</label>
    <input type="text" class="form-control" name="genre" id="validationCustom02" value="<?php
        echo $res['Country'];
    ?>" disabled required>
  </div>
  </div>
</form>
</div>
<div class="container">
<h2>Список фильмов в которых участвовал этот актер:</h2>
<table class="table table-striped table-hover table-bordered container">  
  <thead>
  <tr>
    <th><a href="?order=id">#</a></th>
      <th><a href="?order=title">Название</a></th>
      <th><a href="?order=genre">Жанр</a></th>
      <th>Краткое описание</th>
      <th><a href="?order=Name">Студия</a></th>
      <th><a href="?order=Director">Режиссёр</a></th>
      <th><a href="?order=Year_production">Год выпуска</a></th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = $sql = "SELECT film.`ID`, studio.`ID` as `SID`,`Title`,`Name`,`Director`,`Year_production`,`synopsis`,`Genre` FROM `film`, `studio`, `cast` WHERE film.ID = cast.ID_film and film.ID_studio = studio.ID and cast.ID_actor = $id";
  $res = $mysqli->query($sql);
  for($i = 0; $i < $res->num_rows; $i++){
      $fetch = $res->fetch_assoc();
      $ida = $fetch['ID'];
      $title = $fetch['Title'];
      $genre = $fetch['Genre'];
      $studio = $fetch['Name'];
      $sid = $fetch['SID'];
      $director = $fetch['Director'];
      $year = $fetch['Year_production'];
      $syn = $fetch['synopsis'];
      echo "<tr>";
      echo "<th>$ida</th>";
      echo "<td><a href=\"/movies/$ida\">$title</a></td>";
      echo "<th>$genre</th>";
      echo "<th>$syn</th>";
      echo "<td><a href=\"/studios/$sid\">$studio</a></td>";
      echo "<th>$director</th>";
      echo "<th>$year</th>";
      
      echo "</tr>";
  }
  ?>
  </tbody>
</table>
</div>