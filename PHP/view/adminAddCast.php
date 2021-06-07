<?php
require_once "./PHP/dbconnect.php";
global $mysqli;
if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM `cast` WHERE ID = '$id'";
    $res = $mysqli->query($sql);
    $res = $res->fetch_assoc();
}

?>


<div class="container">
<form class="row g-3 needs-validation" novalidate method="POST" action="/api/updateOrAddCast">
   <div class="col-md-1">

    <?php
    if(isset($_GET['id'])){
    ?>
    <input type="hidden" class="form-control" name="id" id="validationCustom00" value="<?php 
        echo $_GET['id'];
    ?>">
    <?php
    }
    ?>
    <label for="validationCustom00" class="form-label">ID</label>
    <input type="text" class="form-control" name="id" id="validationCustom00" value="<?php 
    if(isset($_GET['id'])){
        echo $_GET['id'];
    }
    ?>" disabled required>
    <div class="valid-feedback">
      Все хорошо!
    </div>
  </div>
  
  <div class="col-md-3">
    <label for="validationCustom04"  class="form-label">Фильм</label>
    <select class="form-control form-select" name="film" id="validationCustom04" required>
    <?php
      $sql = "SELECT * FROM `film`";
      $r = $mysqli->query($sql);
      $check = false;
      for($i = 0; $i < $r->num_rows; $i++){
          $s = $r->fetch_assoc();
          if(isset($_GET['id'])){
            if($s['ID'] == $res['ID_film']){
                $id = $s['ID'];
                echo "<option selected value=\"$id\">";
                $check = true;
              }else{
                $id = $s['ID'];
                echo "<option value=\"$id\">";
              }
          }else{
            $id = $s['ID'];
            echo "<option value=\"$id\">";
          }
          echo $s['ID'] . " - " . $s['Title'];
          echo "</option>";
      }
      if(!$check){
          echo "<option selected disabled value=\"\">Выберите...</option>";
      }
      ?>
    </select>
    <div class="invalid-feedback">
      Пожалуйста, выберите студию.
    </div>
  </div>

  <div class="col-md-3">
    <label for="validationCustom04"  class="form-label">Актер</label>
    <select class="form-control form-select" name="actor" id="validationCustom04" required>
    <?php
      $sql = "SELECT * FROM `actor`";
      $r = $mysqli->query($sql);
      $check = false;
      for($i = 0; $i < $r->num_rows; $i++){
          $s = $r->fetch_assoc();
          if(isset($_GET['id'])){
            if($s['ID'] == $res['ID_actor']){
                $id = $s['ID'];
                echo "<option selected value=\"$id\">";
                $check = true;
              }else{
                $id = $s['ID'];
                echo "<option value=\"$id\">";
              }
          }else{
            $id = $s['ID'];
            echo "<option value=\"$id\">";
          }
          echo  $s['ID'] . " - " . $s['Full_name'];
          echo "</option>";
      }
      if(!$check){
          echo "<option selected disabled value=\"\">Выберите...</option>";
      }
      ?>
    </select>
    <div class="invalid-feedback">
      Пожалуйста, выберите студию.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Тип участия</label>
    <input type="text" class="form-control"  name="type" id="validationCustom05" value="<?php
    if(isset($_GET['id'])){
        echo $res['Type'];
    }
    ?>"required>
    <div class="invalid-feedback">
      Пожалуйста, впишите фио режиссёра.
    </div>
  </div>
  <div class="col-12 my-2">
    <button class="btn btn-primary" type="submit">Создать/Обновить</button>
  </div>
  </div>
</form>
</div>

<script>
(function () {
  'use strict'

  // Получите все формы, к которым мы хотим применить пользовательские стили проверки Bootstrap
  var forms = document.querySelectorAll('.needs-validation')

  // Зацикливайтесь на них и предотвращайте отправку
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>