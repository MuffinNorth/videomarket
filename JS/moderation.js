
const example0 = '<div class="asu-feedback-card col-12 col-md-8 d-flex flex-column flex-md-row my-2">\n' +
    '                    <div class="m-3 mt-4">\n' +
    '                        <img class="asu-avatar" src="/static/imgs/avatars/{avatar}">\n' +
    '                    </div>\n' +
    '                    <div class="container-fluid">\n' +
    '                        <div class="mt-2">\n' +
    '                            <strong>{name}, {city}</strong><br>\n' +
    '                            <strong>Группа: </strong>{group} <br>\n' +
    '                            <strong>Место работы:</strong> {workplace}<br>\n' +
    '                            <strong>Email:</strong> {email}<br>\n' +
    '                            <strong>Добавил отзыв с {from}</strong><br>\n' +
    '                        </div>\n' +
    '                        <hr>\n' +
    '                        <div>\n' +
    '                            <p>{review}</p>\n' +
    '                       </div>\n' +
    '                        <hr>\n' +
    '                        <div class="p-2 d-flex justify-content-end">\n' +
    '                            <form action="/admin/edit" method="get">\n' +
    '                                <input type="hidden" value="{id}" name="id">\n' +
    '                                <button class="btn btn-info me-1" href="/out">Редактировать</button>\n' +
    '                            </form>\n' +
    '                            <button class="btn btn-danger me-1" onclick="deny({id})">Отклонить</button>\n' +
    '                            <button class="btn btn-success me-1" onclick="accept({id})">Принять</button>\n' +
    '                        </div>\n' +
    '                    </div>\n' +
    '                </div>';
    const example1 = '<div class="asu-feedback-card col-12 col-md-8 d-flex flex-column flex-md-row my-2">\n' +
    '                    <div class="m-3 mt-4">\n' +
    '                        <img class="asu-avatar" src="/static/imgs/avatars/{avatar}">\n' +
    '                    </div>\n' +
    '                    <div class="container-fluid">\n' +
    '                        <div class="mt-2">\n' +
    '                            <strong>{name}, {city}</strong><br>\n' +
    '                            <strong>Группа: </strong>{group} <br>\n' +
    '                            <strong>Место работы:</strong> {workplace}<br>\n' +
    '                            <strong>Email:</strong> {email}<br>\n' +
    '                            <strong>Добавил отзыв с {from}</strong><br>\n' +
    '                        </div>\n' +
    '                        <hr>\n' +
    '                        <div>\n' +
    '                            <p>{review}</p>\n' +
    '                       </div>\n' +
    '                        <hr>\n' +
    '                        <div class="p-2 d-flex justify-content-end">\n' +
    '                            <form action="/admin/edit" method="get">\n' +
    '                                <input type="hidden" value="{id}" name="id">\n' +
    '                                <button class="btn btn-info me-1" href="/out">Редактировать</button>\n' +
    '                            </form>\n' +
    '                            <button class="btn btn-danger me-1" onclick="deny({id})">Удалить</button>\n' +
    '                            {star}\n' +
    '                        </div>\n' +
    '                    </div>\n' +
    '                </div>';
    const example2 = '<div class="asu-feedback-card col-12 col-md-8 d-flex flex-column flex-md-row my-2">\n' +
    '                    <div class="m-3 mt-4">\n' +
    '                        <img class="asu-avatar" src="/static/imgs/avatars/{avatar}">\n' +
    '                    </div>\n' +
    '                    <div class="container-fluid">\n' +
    '                        <div class="mt-2">\n' +
    '                            <strong>{name}, {city}</strong><br>\n' +
    '                            <strong>Группа: </strong>{group} <br>\n' +
    '                            <strong>Место работы:</strong> {workplace}<br>\n' +
    '                            <strong>Email:</strong> {email}<br>\n' +
    '                            <strong>Добавил отзыв с {from}</strong><br>\n' +
    '                        </div>\n' +
    '                        <hr>\n' +
    '                        <div>\n' +
    '                            <p>{review}</p>\n' +
    '                       </div>\n' +
    '                        <hr>\n' +
    '                        <div class="p-2 d-flex justify-content-end">\n' +
    '                            <form action="/admin/edit" method="get">\n' +
    '                                <input type="hidden" value="{id}" name="id">\n' +
    '                                <button class="btn btn-info me-1" href="/out">Редактировать</button>\n' +
    '                            </form>\n' +
    '                            <button class="btn btn-danger me-1" onclick="del({id})">Удалить</button>\n' +
    '                            <button class="btn btn-success me-1" onclick="accept({id})">Восстановить</button>\n' +
    '                        </div>\n' +
    '                    </div>\n' +
    '                </div>';


feedbacks = [];

$(document).ready(()=>{
    getFeeds();
})


let typeOfFeedbacks = 0;

const getFeeds = () =>{
    const data = {
        username: username,
        token: token,
        type: typeOfFeedbacks
    }
    feedbacks = [];
    $("#feedholder").empty();
    $.get('/api/aGetFeedbacks', data, (e)=>{
        const array = JSON.parse(JSON.stringify(e))
        for(let i = 1; i <= e.size; i++){
            feedbacks[i-1] = array[i];
            addFeedbacks(array[i]);
        }
        if(e.size == 0){
            $("#feedholder").append("Пока отзывов нет!")
        }
    })
}

const addFeedbacks = (data) => {
    let e;
    if(typeOfFeedbacks == 0){
        e = example0;
    }else if(typeOfFeedbacks == 1){
        e = example1
    }else if(typeOfFeedbacks == 2){
        e = example2
    }

    let btn;
    if(data.favorites == 0){
        btn = '<button class="btn btn-outline-warning me-1 b{id}" onclick="toStar({id})">В избранное</button>';
    }else{
        btn = '<button class="btn btn-warning me-1 b{id}" onclick="toStar({id})">В избранном!</button>';
    }

    let card = e
        .replace('{name}', data.name)
        .replace('{city}', data.city)
        .replace('{avatar}', data.avatar_path)
        .replace('{group}', data.group)
        .replace('{workplace}', data.workplace)
        .replace('{email}', data.email)
        .replace('{review}', data.review)
        .replace('{id}', data.id)
        .replace('{id}', data.id)
        .replace('{star}', btn)
        if(data.from == 0){
            card = card.replace('{from}', "формы \"добавить отзыв\" ")
        }else{
            card = card.replace('{from}', "формы на главной")    
        }
        card = card.replace('{id}', data.id)
        .replace('{id}', data.id);
    $("#feedholder").append(card);
}

const update = () => {
    if(typeOfFeedbacks === 0){
        $('#await').addClass("active")
        $('#public').removeClass("active")
        $('#can').removeClass('active')
    }else if(typeOfFeedbacks === 1){
        $('#public').addClass("active")
        $('#await').removeClass("active")
        $('#can').removeClass('active')
    }else if(typeOfFeedbacks === 2){
        $('#can').addClass("active")
        $('#await').removeClass("active")
        $('#public').removeClass('active')
    }
}

const changeTypeOfFeedbacks = (type) =>{
    typeOfFeedbacks = type;
    getFeeds();
    update();
}

const accept = (id) => {
    alert(id + " was accepted");
    changeTypeOfFeedbacks(typeOfFeedbacks);
}

const deny = (id) => {
    alert(id + " was denyed");
    changeTypeOfFeedbacks(typeOfFeedbacks);
}

const del = (id) => {
    alert(id + " was deleted");

    changeTypeOfFeedbacks(typeOfFeedbacks);
}

const toStar = (id) => {
    if($(".b" + id).hasClass("btn-outline-warning")){
        $(".b" + id).removeClass("btn-outline-warning")
        $(".b" + id).addClass("btn-warning")
        $(".b" + id).text("В избранном!")
    }else{
        $(".b" + id).addClass("btn-outline-warning")
        $(".b" + id).removeClass("btn-warning")
        $(".b" + id).text("В избранное")
    }
    
}

update()