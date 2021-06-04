function addMovie(who, what){
    let date= new Date();
    let when = date.getFullYear() + '-' + (+date.getMonth()+1) + '-' + date.getDate();
    let data = {
        who: who,
        what: what,
        date: when
    }
    $.post('/api/addMovie', data, (e)=>{
        console.log(e);
    })
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
        window.location.reload();
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
    $.get("/api/updateUserData", data, (e)=>{
        console.log(e);
        if(e === "true"){
            alert("Данные успешно обновлены!")
        }
    })
}