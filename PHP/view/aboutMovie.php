<?php
require_once "./PHP/dbconnect.php";
global $mysqli;
global $URI;
if(isset($URI[1])){
    
    $id = $URI[1];
    $sql = "SELECT * FROM `film` WHERE ID = '$id'";
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
    <label for="validationCustom01" class="form-label">Название</label>
    <input type="text" class="form-control" name="title" id="validationCustom01" value="<?php
        echo $res['Title'];
    ?>" disabled required>
  </div>
  <div class="col-md-2">
    <label for="validationCustom02" class="form-label">Основной жанр</label>
    <input type="text" class="form-control" name="genre" id="validationCustom02" value="<?php
        echo $res['Genre'];
    ?>" disabled required>
  </div>
  <div class="col-md-2">
    <label for="validationCustomUsername"  class="form-label">Год выпуска</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" name="year" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php
        echo $res['Year_production'];
    ?>" disabled required>
    </div>
  </div>
  <div class="col-md-2">
    <label for="validationCustomUsername"  class="form-label">Цена в день</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" name="price" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php
        echo $res['Price'];
    ?>" disabled required>
    </div>
  </div>
  
  <div class="col-md-3">
    <label for="validationCustom04"  class="form-label">Студия</label>
    <select class="form-control form-select" disabled name="studio" id="validationCustom04" required>
    <?php
      $is = $res['ID_studio'];
      $sql = "SELECT * FROM `studio` WHERE ID = $is";
      $r = $mysqli->query($sql);
      $r = $r->fetch_assoc();
      $r = $r['Name'];
      echo "<option selected value=\"\">$r</option>";
      ?>
    </select>
  </div>
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">ФИО режиссёра</label>
    <input type="text" class="form-control"  name="director" id="validationCustom05" value="<?php
        echo $res['Director'];
    ?>" disabled required>
  </div>
  <div class="col-md-12">
    <label for="validationCustom03" class="form-label">Краткое описание</label>
    <textarea disabled class="form-control" name="syn" id="validationCustom03" value="" required><?php
        echo $res['synopsis'];
    ?></textarea>
  </div>
  </div>
</form>
</div>
<div class="container">
<button class="btn btn-primary my-1" onclick="<?php
$username = $_SESSION['logindata']['username'];
$id = $URI[1];
echo "addMovie('$username', $id)"
?>" <?php
if($_SESSION['logindata']['role'] != 0 || $_SESSION['logindata']['username'] == "guest"){
    echo "disabled";
}
?>>
Получить копию фильма
</button>
</div>
<div class="container">
<h2>Список актеров участвующие в данном фильме:</h2>
<table class="table table-striped table-hover table-bordered container">  
  <thead>
    <tr>
    <th><a>#</a></th>
      <th><a>ФИО актера</a></th>
      <th><a>Страна актера</a></th>
      <th><a>Тип участия</a></th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT actor.ID, actor.Full_name, actor.Country, cast.Type FROM `cast`, `actor`  WHERE ID_film = '$id' and cast.ID_actor = actor.ID";
  $res = $mysqli->query($sql);
  for($i = 0; $i < $res->num_rows; $i++){
      $fetch = $res->fetch_assoc();
      $ida = $fetch['ID'];
      $fname = $fetch['Full_name'];
      $country = $fetch['Country'];
      $type = $fetch['Type'];
      echo "<tr>";
      echo "<th>$ida</th>";
      echo "<th>$fname</th>";
      echo "<th>$country</th>";
      echo "<th>$type</th>";
      echo "</tr>";
  }
  ?>
  </tbody>
</table>
</div>