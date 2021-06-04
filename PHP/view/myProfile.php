<?php
    require_once "./PHP/dbconnect.php";
    global $mysqli;
    $login = $_SESSION["logindata"]['username'];
    $sql = "SELECT * FROM `client` WHERE client.login = '$login'";
    $res = $mysqli->query($sql);
    $res = $res->fetch_assoc();
?>
<div class="container">
<div class="row g-5 justify-content-center">
    <div class="col-md-7 col-lg-8">
        <form class="needs-validation" novalidate="">
            <div class="row g-3">
                <div class="col-sm-12">
                    <label for="firstName" class="form-label">ФИО:</label>
                    <input type="text" class="form-control" id="name" value="<?=$res['Full_name']?>">
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="username" class="form-label">Имя пользователя</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">@</span>
                        <input type="text" class="form-control" id="username" placeholder="Username" value="<?=$res['login']?>" disabled>
                        <div class="invalid-feedback">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <label for="username" class="form-label">Паспорт</label>
                    <div class="input-group has-validation">
                    <span class="input-group-text"> <i class="fa fa-id-card"></i> </span>
                        <input type="text" class="form-control" id="passport" value="<?=$res['Passport']?>" placeholder="Passport">
                        <div class="invalid-feedback">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <label for="username" class="form-label">Номер телефона</label>
                    <div class="input-group has-validation">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        <input type="text" class="form-control" id="number" placeholder="Phone" value="<?=$res['Phone_number']?>">
                        <div class="invalid-feedback">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <label for="address" class="form-label">Адрес</label>
                    <input type="text" class="form-control" id="address" value="<?=$res['Adress']?>" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="col-12">
                    <label for="address" class="form-label">Новый пароль</label>
                    <input type="password" class="form-control" id="password" placeholder="" required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                
        </form>
        
    </div>
    <button class="w-100 btn btn-primary btn-lg mt-5" onclick="updateUserData()">Обновить данные</button>
        <button class="w-100 btn btn-danger btn-lg mt-1" >Удалить профиль</button>
</div>

</div>
<script>
console.log(<?php
echo json_encode($_SESSION['logindata']);
?>)
</script>