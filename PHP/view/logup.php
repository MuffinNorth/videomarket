<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Создать аккаунт</h4>
	<form>

    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="" class="form-control" placeholder="Логин" type="text" id="login">
    </div> <!-- form-group// -->

	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="" class="form-control" placeholder="Имя" type="text" id="name">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="" class="form-control" placeholder="Фамилия" type="text" id="lname">
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="" class="form-control" placeholder="Email" type="email" id="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
    	<input name="" class="form-control" placeholder="Номер телефона" type="text" id="number">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-id-card"></i> </span>
		</div>
    	<input name="" class="form-control" placeholder="Паспортные данные" type="text" id="passport">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
		</div>
    	<input name="" class="form-control" placeholder="Адрес проживания" type="text" id="addres">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Пароль" type="password" id="password">
    </div> <!-- form-group// -->                                                                                                  
</form>
<div class="form-group">
        <button class="btn btn-primary btn-block" onclick="onSend()"> Создать </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Уже есть аккаунт? <a href="/login">Войдите!</a> </p>   
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

<script>
    const onSend = ()=>{
        const data = {
        registerData: {
            login: $("#login").val(),
            name: $("#name").val(),
            lname: $("#lname").val(),
            email: $("#email").val(),
            phone: $("#number").val(),
            passport: $("#passport").val(),
            addres: $("#addres").val(),
            password: $("#password").val()
        }
    }
    $.post('/register', data, (e)=>{
        console.log(e);
    })
    }
</script>