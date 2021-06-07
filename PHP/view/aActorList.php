<?php
$index = 1;
function generateRow($film_data){
    $name = $film_data['Full_name'];
    $id = $film_data['ID'];
    $country = $film_data['Country'];
    $username = $_SESSION['logindata']['username'];
    echo "<tr>";
    echo "<th scope=\"row\">";
    echo $id;
    echo "</th>";
    echo "<td><a href=\"/actor/$id\">$name</a></td>";
    echo "<td>$country</td>";
    if($_SESSION['logindata']['isLogin']){
      echo "<td class=\"d-flex justify-content-center\">
    <a class=\"btn btn-warning\" href=\"/adminAddActor?id=$id\">Редактировать актера</a>
    </td>";
    echo "<td class=\"d-flex justify-content-center\">
    <button class=\"btn btn-danger\" onClick=\"adminDelActor($id)\" >Удалить</button>
    </td>";
    }
    echo "</tr>";
}

?>
<div class="my-2 container d-flex justify-content-center">
    <a class="btn btn-primary" href="/adminAddActor">Добавить актера</a> 
</div>
<table class="table table-striped table-hover table-bordered container">  
    
  <thead>
    <tr>
    <th><a href="?order=id">#</a></th>
      <th><a href="?order=Full_name">ФИО</a></th>
      <th><a href="?order=Country">Страна</a></th>
      <th>Действия</th>
    </tr>

  </thead>
  <tbody>
  <?php
  global $mysqli;
  if(isset($_GET['order'])){
    $by = $_GET['order'];
    $sql = "SELECT * FROM `actor`  order by $by";
  }else{
    $sql = "SELECT * FROM `actor`"; 
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