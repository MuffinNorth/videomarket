<?php
$index = 1;
function generateRow($film_data){
    $title = $film_data['Title'];
    $id = $film_data['ID'];
    $sid = $film_data['SID'];
    $genre = $film_data['Genre'];
    $syn = $film_data['synopsis'];
    $studio = $film_data['Name'];
    $director = $film_data['Director'];
    $year = $film_data['Year_production'];
    $price = $film_data['Price'];
    $username = $_SESSION['logindata']['username'];
    echo "<tr>";
    echo "<th scope=\"row\">";
    echo $id;
    echo "</th>";
    echo "<td><a href=\"/movies/$id\">$title</a></td>";
    echo "<td>$genre</td>";
    echo "<td>$syn</td>";
    echo "<td><a href=\"/studios/$sid\">$studio</a></td>";
    echo "<td>$director</td>";
    echo "<td>$year</td>";
    echo "<td>$price</td>";
    if($_SESSION['logindata']['isLogin']){
      echo "<td class=\"d-flex justify-content-center\">
    <a class=\"btn btn-warning\" href=\"/adminAddMovie?id=$id\">Редактировать фильм</a>
    </td>";
    echo "<td class=\"d-flex justify-content-center\">
    <button class=\"btn btn-danger\" onClick=\"adminDelMovie($id)\" >Удалить</button>
    </td>";
    }
    echo "</tr>";
}

?>
<table class="table table-striped table-hover table-bordered">  
    <div class="row m-1">
    <a class="btn btn-primary" href="/adminAddMovie">Добавить фильм</a> 
    </div>
  <thead>
    <tr>
    <th><a href="?order=id">#</a></th>
      <th><a href="?order=title">Название</a></th>
      <th><a href="?order=genre">Жанр</a></th>
      <th>Краткое описание</th>
      <th><a href="?order=Name">Студия</a></th>
      <th><a href="?order=Director">Режиссёр</a></th>
      <th><a href="?order=Year_production">Год выпуска</a></th>
      <th><a href="?order=Price">Цена</a></th>
      <th>Действия</th>
    </tr>

  </thead>
  <tbody>
  <?php
  global $mysqli;
  if(isset($_GET['order'])){
    $by = $_GET['order'];
    $sql = "SELECT film.`ID`, studio.`ID` as `SID`,`Title`,`Name`,`Director`,`Year_production`,`Price`,`synopsis`,`Genre` FROM `film`, `studio` WHERE 1 and film.ID_studio = studio.ID order by $by";
  }else{
    $sql = "SELECT film.`ID`, studio.`ID` as `SID`,`Title`,`Name`,`Director`,`Year_production`,`Price`,`synopsis`,`Genre` FROM `film`, `studio` WHERE 1 and film.ID_studio = studio.ID"; 
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