<?php
require_once "./PHP/dbconnect.php";
global $mysqli;
if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM `film` WHERE ID = '$id'";
    $res = $mysqli->query($sql);
    $res = $res->fetch_assoc();
}

?>


<div class="container">
<form class="row g-3 needs-validation" novalidate method="POST" action="/api/updateOrAddFilm">
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
  <div class="col-md-5">
    <label for="validationCustom01" class="form-label">Название</label>
    <input type="text" class="form-control" name="title" id="validationCustom01" value="<?php
    if(isset($_GET['id'])){
        echo $res['Title'];
    }
    ?>" required>
    <div class="valid-feedback">
      Все хорошо!
    </div>
  </div>
  <div class="col-md-2">
    <label for="validationCustom02" class="form-label">Основной жанр</label>
    <input type="text" class="form-control" name="genre" id="validationCustom02" value="<?php
    if(isset($_GET['id'])){
        echo $res['Genre'];
    }
    ?>" required>
    <div class="valid-feedback">
      Все хорошо!
    </div>
  </div>
  <div class="col-md-2">
    <label for="validationCustomUsername"  class="form-label">Год выпуска</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" name="year" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php
    if(isset($_GET['id'])){
        echo $res['Year_production'];
    }
    ?>" required>
      <div class="invalid-feedback">
        Пожалуйста, впишите год выпуска.
      </div>
    </div>
  </div>
  <div class="col-md-2">
    <label for="validationCustomUsername"  class="form-label">Цена в день</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" name="price" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php
    if(isset($_GET['id'])){
        echo $res['Price'];
    }
    ?>" required>
      <div class="invalid-feedback">
        Пожалуйста, впишите цену в день.
      </div>
    </div>
  </div>
  
  <div class="col-md-3">
    <label for="validationCustom04"  class="form-label">Студия</label>
    <select class="form-control form-select" name="studio" id="validationCustom04" required>
    <?php
      $sql = "SELECT * FROM `studio`";
      $r = $mysqli->query($sql);
      $check = false;
      for($i = 0; $i < $r->num_rows; $i++){
          $s = $r->fetch_assoc();
          if(isset($_GET['id'])){
            if($s['ID'] == $res['ID_studio']){
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
          echo  $s['Name'] . " - " . $s['Country'];
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
    <label for="validationCustom05" class="form-label">ФИО режиссёра</label>
    <input type="text" class="form-control"  name="director" id="validationCustom05" value="<?php
    if(isset($_GET['id'])){
        echo $res['Director'];
    }
    ?>"required>
    <div class="invalid-feedback">
      Пожалуйста, впишите фио режиссёра.
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom03" class="form-label">Краткое описание</label>
    <textarea class="form-control" name="syn" id="validationCustom03" value="" required><?php
    if(isset($_GET['id'])){
        echo $res['synopsis'];
    }
    ?></textarea>
    <div class="invalid-feedback">
      Пожалуйста, введите сообщение в текстовое поле.
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Отправить форму</button>
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