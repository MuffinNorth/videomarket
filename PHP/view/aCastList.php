<?php
$index = 1;
function generateRow($film_data){
    $name = $film_data['Full_name'];
    $title = $film_data['Title'];
    $type = $film_data['Type'];
    $id = $film_data['ID'];
    $aid = $film_data['aid'];
    $fid = $film_data['fid'];
    $username = $_SESSION['logindata']['username'];
    echo "<tr>";
    echo "<th scope=\"row\">";
    echo $id;
    echo "</th>";
    echo "<td><a href=\"/actor/$aid\">$name</a></td>";
    echo "<td><a href=\"/movies/$fid\">$title</a></td>";
    echo "<td><a>$type</a></td>";
    if($_SESSION['logindata']['isLogin']){
      echo "<td class=\"d-flex justify-content-center\">
    <a class=\"btn btn-warning\" href=\"/adminAddCast?id=$id\">Редактировать связь</a>
    </td>";
    echo "<td class=\"d-flex justify-content-center\">
    <button class=\"btn btn-danger\" onClick=\"adminDelCast($id)\" >Удалить</button>
    </td>";
    }
    echo "</tr>";
}

?>
<div class="my-2 container d-flex justify-content-center">
    <a class="btn btn-primary" href="/adminAddCast">Добавить связь между фильмом и актером</a> 
</div>
<table class="table table-striped table-hover table-bordered container">  
    
  <thead>
    <tr>
    <th><a href="?order=id">#</a></th>
      <th><a href="?order=Full_name">ФИО</a></th>
      <th><a href="?order=Title">Фильм</a></th>
      <th><a href="?order=Type">Тип участия</a></th>
      <th>Действия</th>
    </tr>

  </thead>
  <tbody>
  <?php
  global $mysqli;
  if(isset($_GET['order'])){
    $by = $_GET['order'];
    $sql = "SELECT cast.ID, actor.Full_name, film.Title, cast.Type, film.ID as `fid`, actor.ID as `aid` FROM `cast`, `actor`, `film` WHERE cast.ID_film=film.ID and actor.ID=cast.ID_actor  order by $by";
  }else{
    $sql = "SELECT cast.ID, actor.Full_name, film.Title, cast.Type, film.ID as `fid`, actor.ID as `aid` FROM `cast`, `actor`, `film` WHERE cast.ID_film=film.ID and actor.ID=cast.ID_actor "; 
  }
  $res = $mysqli->query($sql);
  $count = $res->num_rows;
  for($i = 0; $i < $count; $i++){
    $data = $res->fetch_assoc();
    generateRow($data); 
  }
    ?>
  </tbody>
</table>