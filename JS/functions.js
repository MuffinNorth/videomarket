function addMovie(who, what){
    let date= new Date();
    let when = date.getFullYear() + '-' + (+date.getMonth()+1) + '-' + date.getDate();
    let data = {
        who: who,
        what: what,
        date: when
    }

    const result = confirm("Вы уверены, что хотите арендовать этот фильм?");
    if(result){
        $.post('/api/addMovie', data, (e)=>{
            console.log(e);
        })
    }

    
}

function returnMovie(who){
    let date= new Date();
    let when = date.getFullYear() + '-' + (+date.getMonth()+1) + '-' + date.getDate();
    let data = {
        who: who,
        date: when
    }
    $.post('/api/returnMovie', data, (e)=>{
        console.log(e);
        window.location.href = '/mylist';
    })
    
}

function updateUserData(){
    const data = {
        name: $('#name').val(),
        username: $('#username').val(),
        passport: $('#passport').val(),
        phone: $('#number').val(),
        addres: $('#address').val(),
        password: $('#password').val()
    }
    console.log(data)
    $.get("/api/updateUserData", data, (e)=>{
        console.log(e);
        if(e === "true"){
            alert("Данные успешно обновлены!")
        }
    })
}
function adminDelMovie(id){
    const result = confirm("Вы уверены, что хотите удалить этот фильм? (Возможна потеря записей об аренде)");
    if(result){
        $.get("/api/delMovie", {id:id}, (e)=>{
            document.location.reload();
        })
    }
    
}
function adminDelStudio(id){
    const result = confirm("Вы уверены, что хотите удалить эту студию? (Вместе с ней будут удаленные связанные фильмы)");
    if(result){
        $.get("/api/delStudio", {id:id}, (e)=>{
            document.location.reload();
        })
    }
    
}
function adminDelActor(id){
    const result = confirm("Вы уверены, что хотите удалить этого актера?");
    if(result){
        $.get("/api/delActor", {id:id}, (e)=>{
            document.location.reload();
        })
    }
    
}
function adminDelCast(id){
    const result = confirm("Вы уверены, что хотите удалить эту связь?");
    if(result){
        $.get("/api/delCast", {id:id}, (e)=>{
            document.location.reload();
        })
    }
    
}