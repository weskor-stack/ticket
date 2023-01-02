const update = document.getElementById('update');

const API_URL = 'https://192.168.3.200/api/obtener_clientes';

const xhr = new XMLHttpRequest();

const callAPI2 = () =>{
    // alert("Llamando API");
    $.ajax({
        url: "https://jsonplaceholder.typicode.com/users",
        type: 'GET',
        contentType: "application/javascript",
        headers: {'Access-Control-Allow-Origin':'*'},
        dataType: 'jsonp',
        success: function(data) {
            console.log(data);
        }
    
    });
}

function callAPI() {
    // alert("Llamando API");
    fetch('https://192.168.3.200/api/obtener_clientes',{
        contentType: "application/json",
        headers: {'Access-Control-Allow-Origin':'*'},
    })
        .then(res => res.json())
        .then(data => console.log(data))
        .catch(e => console.error(new Error(e)));
    // console.log("data");
}

update.addEventListener('click', callAPI);