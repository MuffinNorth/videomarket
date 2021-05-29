<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Войти в аккаунт</h4>
	<form method="POST" action="/log-in">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="login" class="form-control" placeholder="Логин" type="text" id='login'>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Пароль" type="password" id='password'>
    </div> <!-- form-group// -->                                                                                                  
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Войти </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Нет аккаунта? <a href="/logup">Зарегистрируйтесь!</a> </p>   
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

<script>
    const onSend = ()=>{
        data = {
            login: $('#login').val(),
            password: $('#password').val()
        }
        console.log(data);
        $.post('/log-in', data, (e)=>{
        console.log(e)
    })
    }
    
</script>