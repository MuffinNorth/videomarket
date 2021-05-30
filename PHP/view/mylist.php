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
    echo "<td>$title</td>";
    echo "<td>$genre</td>";
    echo "<td>$syn</td>";
    echo "<td><a href=\"/studios/$sid\">$studio</a></td>";
    echo "<td>$director</td>";
    echo "<td>$year</td>";
    echo "<td>$price</td>";
    if($_SESSION['logindata']['isLogin']){
      echo "<td class=\"d-flex justify-content-center\">
    <button class=\"btn btn-info\" onclick=\"addMovie('$username', $id)\">Получить копию</button>
    </td>";
    }else{
      echo "<td class=\"d-flex justify-content-center\">
    <button class=\"btn btn-info\" disabled>Получить копию</button>
    </td>";
    }
    echo "</tr>";
}

?>
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Название</th>
      <th>Жанр</th>
      <th>Краткое описание</th>
      <th>Студия</th>
      <th>Режиссёр</th>
      <th>Год выпуска</th>
      <th>Цена (руб/день)</th>
      <th>Действия</th>
    </tr>
    
  </thead>
  <tbody>
  <?php
  global $mysqli;
  global $URI;
  $who = $_SESSION['logindata']['username'];
  $sql = "SELECT id FROM `client` WHERE login='$who'";
  $res = $mysqli->query($sql);
  $iduser = $res->fetch_assoc()['id'];
  $sql = "SELECT film.`ID`, studio.`ID` as `SID`,`Title`,`Name`,`Director`,`Year_production`,`Price`,`synopsis`,`Genre`, rent.Date_out, rent.Date_in FROM `film`, `studio`, `rent` WHERE ID_client = $iduser and film.ID = rent.ID_film and film.ID_studio = studio.ID; ";
  $res = $mysqli->query($sql);
  $count = $res->num_rows;
  for($i = 0; $i < $count; $i++){
    $data = $res->fetch_assoc();
    generateRow($data); 
  }
    ?>
  </tbody>
</table>