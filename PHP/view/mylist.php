<?php
$index = 0;
function generateRow($film_data){
  global $index;
    $title = $film_data['Title'];
    $id = $film_data['ID'];
    $sid = $film_data['SID'];
    $rid = $film_data['RID'];
    $genre = $film_data['Genre'];
    $syn = $film_data['synopsis'];
    $studio = $film_data['Name'];
    $director = $film_data['Director'];
    $year = $film_data['Date_out'];
    $price = $film_data['Price'];
    $username = $_SESSION['logindata']['username'];
    $outprice = $film_data['days'];
    echo "<tr>";
    echo "<th scope=\"row\">";
    $index++;
    echo $index;
    echo "</th>";
    echo "<td><a href=\"/movies/$id\">$title</a></td>";
    echo "<td>$genre</td>";
    echo "<td><a href=\"/studios/$sid\">$studio</a></td>";
    echo "<td>$director</td>";
    echo "<td>$year</td>";
    echo "<td>$price</td>";
    echo "<td>$outprice</td>";
    if($_SESSION['logindata']['isLogin']){
      echo "<td class=\"d-flex justify-content-center\">
    <a class=\"btn btn-primary\" href=\"/paymentPage/$rid/$outprice\">Вернуть и оплатить</a>
    </td>";
    }else{
      echo "<td class=\"d-flex justify-content-center\">
    <button class=\"btn btn-info\" disabled>Получить копию</button>
    </td>";
    }
    echo "</tr>";
}

?>
<div class="row m-1 d-flex flex-row justify-content-between">
<h3>Список арендованных фильмов: </h3>
<button class="btn btn-danger">Вернуть и оплатить все фильмы!</button>
</div>
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th><a href="?order=title">Название</a></th>
      <th><a href="?order=genre">Жанр</a></th>
      <th><a href="?order=Name">Студия</a></th>
      <th><a href="?order=Director">Режиссёр</a></th>
      <th><a href="?order=Year_production">Дата взятия</a></th>
      <th><a href="?order=Price">Цена</a></th>
      <th><a href="?order=Days">К оплате</a></th>
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
  if(isset($_GET['order'])){
    $by = $_GET['order'];
    $sql = "SELECT film.`ID`, studio.`ID` as `SID`,`Title`,`Name`,`Director`,`Year_production`,`Price`,`synopsis`,`Genre`, rent.Date_out, rent.Date_in, rent.ID as `RID`, (DATEDIFF(CURRENT_DATE(), rent.Date_out)+1)*Price AS days FROM `film`, `studio`, `rent` WHERE ID_client = $iduser and film.ID = rent.ID_film and film.ID_studio = studio.ID and Date_in IS NULL order by $by; ";
  }else{
    $sql = "SELECT film.`ID`, studio.`ID` as `SID`,`Title`,`Name`,`Director`,`Year_production`,`Price`,`synopsis`,`Genre`, rent.Date_out, rent.Date_in, rent.ID as `RID`, (DATEDIFF(CURRENT_DATE(), rent.Date_out)+1)*Price AS days FROM `film`, `studio`, `rent` WHERE ID_client = $iduser and film.ID = rent.ID_film and film.ID_studio = studio.ID and Date_in IS NULL; ";
  }
  $res = $mysqli->query($sql);
  $count = $res->num_rows;
  for($i = 0; $i < $count; $i++){
    $data = $res->fetch_assoc();
    $index = 0;
    generateRow($data); 
  }
    ?>
  </tbody>
</table>