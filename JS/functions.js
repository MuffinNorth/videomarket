function addMovie(who, what){
    let date= new Date();
    let when = date.getFullYear() + '-' + (+date.getMonth()+1) + '-' + date.getDate();
    let data = {
        who: who,
        what: what,
        date: when
    }
    alert(when);
    $.post('/api/addMovie', data, (e)=>{
        console.log(e);
    })
}