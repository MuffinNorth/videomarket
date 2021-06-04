<?php
$index = 1;
function generateRow($film_data){
    $title = $film_data['Name'];
    $id = $film_data['ID'];
    $country = $film_data['Country'];
    echo "<tr>";
    echo "<th scope=\"row\">";
    echo $id;
    echo "</th>";
    echo "<td><a href=\"/studios/$id\">$title</a></td>";
    echo "<td>$country</td>";
    if($_SESSION['logindata']['isLogin']){
      echo "<td class=\"d-flex justify-content-center\">
    <a class=\"btn btn-warning\" href=\"/adminAddStudio?id=$id\">Редактировать студию</a>
    </td>";
    echo "<td class=\"d-flex justify-content-center\">
    <button class=\"btn btn-danger\" onClick=\"adminDelStudio($id)\" >Удалить</button>
    </td>";
    }
    echo "</tr>";
}

?>
<table class="table table-striped table-hover table-bordered container">  
    <div class="row m-1 justify-content-center">
    <a class="btn btn-primary" href="/adminAddStudio">Добавить студию</a> 
    </div>
  <thead>
    <tr>
    <th><a href="?order=id">#</a></th>
      <th><a href="?order=Name">Название</a></th>
      <th><a href="?order=Country">Страна</a></th>
      <th>Действия</th>
    </tr>

  </thead>
  <tbody>
  <?php
  global $mysqli;
  if(isset($_GET['order'])){
    $by = $_GET['order'];
    $sql = "SELECT * FROM `studio` WHERE 1 order by $by";
  }else{
    $sql = "SELECT * FROM `studio` WHERE 1"; 
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