<?php
require_once "./PHP/dbconnect.php";
global $mysqli;
if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM `studio` WHERE ID = '$id'";
    $res = $mysqli->query($sql);
    $res = $res->fetch_assoc();
}

?>


<div class="container">
<form class="row g-3 needs-validation" novalidate method="POST" action="/api/updateOrAddStudio">
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
    <input type="text" class="form-control" name="name" id="validationCustom01" value="<?php
    if(isset($_GET['id'])){
        echo $res['Name'];
    }
    ?>" required>
    <div class="valid-feedback">
      Все хорошо!
    </div>
  </div>
  <div class="col-md-2">
    <label for="validationCustom02" class="form-label">Страна</label>
    <input type="text" class="form-control" name="country" id="validationCustom02" value="<?php
    if(isset($_GET['id'])){
        echo $res['Country'];
    }
    ?>" required>
    <div class="valid-feedback">
      Все хорошо!
    </div>
  </div>

  <div class="col-12 my-2">
    <button class="btn btn-primary" type="submit">Создать/Редактировать</button>
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