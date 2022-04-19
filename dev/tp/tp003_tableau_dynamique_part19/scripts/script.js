import Table from './class/Table.js';


document.addEventListener('DOMContentLoaded', function(){

let tbody = document.querySelector('#biens');
let table = new Table(tbody);
table.initTableContent();









/************************************* */
document.querySelector('#add-good').addEventListener('click', function(){

    document.querySelector('#black-screen').style.display = 'flex';

});

document.querySelector('#black-screen').addEventListener('click', (event) => {

    event.target.style.display = 'none';

});

document.querySelector('#form1').addEventListener('click', (event) => {

    event.stopPropagation();

});




document.querySelector('#form1').addEventListener('submit', function(event){

    event.preventDefault();
    let nom = document.querySelector('#nom').value;
    let prix = document.querySelector('#prix').value;
    let ville = document.querySelector('#ville').value;
    let adresse = document.querySelector('#adresse').value;

    if( /[a-z]+/ig.test(nom) == false ){
        document.querySelector('#msg-nom').innerText = 'Veuillez saisir un nom correct';
        return false;
    }

    if( /[0-9]+/.test(prix) == false ){
        document.querySelector('#msg-prix').innerText = 'Veuillez saisir un prix correct';
        return false;
    }
    if( /[a-z]+/ig.test(ville) == false ){
        document.querySelector('#msg-ville').innerText = 'Veuillez saisir une ville correcte';
        return false;
    }
    if( /[a-z0-9]+/ig.test(adresse) == false ){
        document.querySelector('#msg-adresse').innerText = 'Veuillez saisir une adresse correcte';
        return false;
    }

    // Code a éxécuter lorsque le formulaire est bien remplis

    let xhr = new XMLHttpRequest();

    xhr.open('POST', 'http://localhost/dev-web/tp/prets/tableau-dynamique/insertion.php');

    xhr.responseType = 'text';

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(`name=${nom}&price=${prix}&city=${ville}&address=${adresse}`);

    xhr.onload = function(event){

        console.log(event.target.response);

        // Faire disparaitre la popu du formulaire

        document.querySelector('#black-screen').style.display = 'none';

        document.querySelector('#message-serveur').innerText = event.target.response;

    }

})



//******** Code de récupération des biens filtrés par la ville saisie */


document.querySelector('#form-city').addEventListener('submit', function(event){

    event.preventDefault();

    let city = document.querySelector('#input-city-filter').value;

    console.log(city);
    if(city != ''){

        let xhr = new XMLHttpRequest();

        xhr.open('POST', 'http://localhost/dev-web/tp/prets/tableau-dynamique/get-biens.php');
    
        xhr.responseType = 'json';
    
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
        xhr.send(`city-filter=${city}`);
    
        xhr.onload = function(event){
            document.querySelector('#biens').innerHTML = '';
            for(let bien of event.target.response){

                document.querySelector('#biens').innerHTML += 
                `
                    <tr id="tr${bien.id}">
                        <td>${bien.id}</td>
                        <td>${bien.name}</td>
                        <td>${bien.price}</td>
                        <td>
                            <span class="city" id="city${bien.id}">${bien.city}</span>
                            <textarea cols="60" rows="1" class="textarea-city" id="textarea-city${bien.id}">${bien.city}</textarea>
                        <td>
                            <!-- On met un id unique à chaque textarea -->
                            <span class="address" id="address${bien.id}">${bien.address}</span>
                            <textarea cols="60" rows="1" class="textarea-address" id="textarea-address${bien.id}">${bien.address}</textarea>
                        </td> 
                        <td>
                            <img src="img/${bien.image}" id="img-upload${bien.id}" class="img-bien">
                            <form action="" method="post" enctype="multipart/form-data">
                            <div>
                                <input type="file" name="image" class="img-estate">
                                <input type="hidden" name="id_bien" value="${bien.id}">
                            </div>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id-bien-suppr" value="${bien.id}">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        
                        </td>
                    </tr>
                `;

                

            }
            initTable();

        }

    }

});

/********** Boutons de pagination */

let page = 0 ;

document.querySelector('#img-next').addEventListener('click', function(){

    let xhr = new XMLHttpRequest();

    xhr.open('POST', 'http://localhost/dev-web/tp/prets/tableau-dynamique/pagination.php');

    xhr.responseType = 'json';

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(`page=${page}&step=next`);

    xhr.onload = (event)=> {

        document.querySelector('#img-previous').style.display = 'inline-block';

        if(page < parseInt(event.target.response.nb_page) - 1){
            page++;
        }else{
            page = event.target.response.nb_page - 1;
            this.style.display = 'none';
        }

        if(page == parseInt(event.target.response.nb_page) - 1){
        }

        console.log(page);

        document.querySelector('#biens').innerHTML = '';

        for(let bien of event.target.response.list){

            document.querySelector('#biens').innerHTML += 
            `
                <tr id="tr${bien.id}">
                    <td>${bien.id}</td>
                    <td>${bien.name}</td>
                    <td>${bien.price}</td>
                    <td>
                        <span class="city" id="city${bien.id}">${bien.city}</span>
                        <textarea cols="60" rows="1" class="textarea-city" id="textarea-city${bien.id}">${bien.city}</textarea>
                    <td>
                        <!-- On met un id unique à chaque textarea -->
                        <span class="address" id="address${bien.id}">${bien.address}</span>
                        <textarea cols="60" rows="1" class="textarea-address" id="textarea-address${bien.id}">${bien.address}</textarea>
                    </td>  
                    <td>
                        <img src="img/${bien.image}" id="img-upload${bien.id}" class="img-bien">
                        <form action="" method="post" enctype="multipart/form-data">
                        <div>
                            <input type="file" name="image" class="img-estate">
                            <input type="hidden" name="id_bien" value="${bien.id}">
                        </div>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id-bien-suppr" value="${bien.id}">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    
                    </td>
                </tr>
            `;

            

        }

        initTable();

    }

});


document.querySelector('#img-previous').addEventListener('click', function(){

    let xhr = new XMLHttpRequest();

    xhr.open('POST', 'http://localhost/dev-web/tp/prets/tableau-dynamique/pagination.php');

    xhr.responseType = 'json';

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(`page=${page}&step=previous`);

    xhr.onload = (event)=>{

        document.querySelector('#img-next').style.display = 'inline-block';
        if(page > 0){
            page--;
        }else{
            page = 0;
        }

        if(page == 0){
            this.style.display = 'none';
        }
        
        console.log(page);

        document.querySelector('#biens').innerHTML = '';

        for(let bien of event.target.response.list){

            document.querySelector('#biens').innerHTML += 
            `
                <tr id="tr${bien.id}">
                    <td>${bien.id}</td>
                    <td>${bien.name}</td>
                    <td>${bien.price}</td>
                    <td>
                        <span class="city" id="city${bien.id}">${bien.city}</span>
                        <textarea cols="60" rows="1" class="textarea-city" id="textarea-city${bien.id}">${bien.city}</textarea>
                    <td>
                        <!-- On met un id unique à chaque textarea -->
                        <span class="address" id="address${bien.id}">${bien.address}</span>
                        <textarea cols="60" rows="1" class="textarea-address" id="textarea-address${bien.id}">${bien.address}</textarea>
                    </td>
                    <td>
                        <img src="img/${bien.image}" id="img-upload${bien.id}" class="img-bien">
                        <form action="" method="post" enctype="multipart/form-data">
                        <div>
                            <input type="file" name="image" class="img-estate">
                            <input type="hidden" name="id_bien" value="${bien.id}">
                        </div>
                    </td>   
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id-bien-suppr" value="${bien.id}">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    
                    </td>
                </tr>
            `;

            

        }

        initTable();

    }


});

/*************** Input de pagination */



document.querySelector('#page_actuelle').addEventListener('keyup', function(event){

    let page_selected = event.target.value;

    
    if(page_selected != ''){



            let xhr = new XMLHttpRequest();

            xhr.open('POST', 'http://localhost/dev-web/tp/prets/tableau-dynamique/pagination.php');
        
            xhr.responseType = 'json';
        
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
            xhr.send(`page_selected=${page_selected}`);
        
            xhr.onload = (event)=>{
        
                console.log(page_selected);
                console.log(event.target.response.nb_page);
                if(page_selected <= event.target.response.nb_page){
                    // document.querySelector('#img-next').style.display = 'inline-block';
                    page = page_selected;
            
                    // if(page == 0){
                    //     this.style.display = 'none';
                    // }
                    
                    // console.log(page);
            
                    document.querySelector('#biens').innerHTML = '';
            
                    for(let bien of event.target.response.list){
            
                        document.querySelector('#biens').innerHTML += 
                        `
                            <tr id="tr${bien.id}">
                                <td>${bien.id}</td>
                                <td>${bien.name}</td>
                                <td>${bien.price}</td>
                                <td>
                                    <span class="city" id="city${bien.id}">${bien.city}</span>
                                    <textarea cols="60" rows="1" class="textarea-city" id="textarea-city${bien.id}">${bien.city}</textarea>
                                <td>
                                    <!-- On met un id unique à chaque textarea -->
                                    <span class="address" id="address${bien.id}">${bien.address}</span>
                                    <textarea cols="60" rows="1" class="textarea-address" id="textarea-address${bien.id}">${bien.address}</textarea>
                                </td> 
                                <td>
                                    <img src="img/${bien.image}" id="img-upload${bien.id}" class="img-bien">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <div>
                                        <input type="file" name="image" class="img-estate">
                                        <input type="hidden" name="id_bien" value="${bien.id}">
                                    </div>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="id-bien-suppr" value="${bien.id}">
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                
                                </td>
                            </tr>
                        `;
                }

                initTable();

        
                    
        
                }

            }





    }
    
})



});





