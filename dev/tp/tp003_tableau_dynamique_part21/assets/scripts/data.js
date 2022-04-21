let host = 'http://localhost/DWO/dev/tp/tp003_tableau_dynamique_part21/';

function send(data){

    let xhr = new XMLHttpRequest();

    xhr.open(data.method, `${data.url}`);

    xhr.responseType = data.responseType;

    if(data.method.toLowerCase() == 'post' ){
        console.log('posted')
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    }
    let content = '';
    
    for(let d in data.data){
        content += `${d}=${data.data[d]}&`;
    }

    content = content.substring(0, content.length - 1);
    console.log(content);
    xhr.send(content);

    return xhr;

}

export {
    host,
    send
}