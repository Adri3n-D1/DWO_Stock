import {host} from '../data.js';

export default class Table{

    constructor(tbody){
        this.tbody = tbody;
    }

    reloadElements(){
        this.textearea_address = document.querySelectorAll('.textarea-address');
        this.textarea_city = document.querySelectorAll('.textarea-city');
        this.spans_address = document.querySelectorAll('.address');
        this.spans_city = document.querySelectorAll('.city');
        this.btn_delete_estate = document.querySelectorAll('.btn-delete-estate');
        this.input_file_img = document.querySelectorAll('.img-estate');
    }

    initTableContent(){
        /***** Récupération en AJAX de la liste des bien au moment du chargement de la page ************************** */
        let xhr = new XMLHttpRequest();
        xhr.open('POST', `get-biens.php`);
        xhr.responseType = 'json';
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send();
        
        xhr.onload = (event)=>{
            this.generate(event.target.response); // On régénère le contenu du tbody
            this.reloadElements(); // On récupère les nouveaux éléments HTML pour les mettre dans les propriétés de la classe
            this.initTable(); // On régénère les actions javascript du nouveau contenu de tbody
        }
    }

    generate(tableau_biens){

        this.tbody.innerHTML = '';

        for(let bien of tableau_biens){
        
            this.tbody.innerHTML += 
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
                        </form>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-danger btn-delete-estate" data-id-estate="${bien.id}">Supprimer</button>
                    </td>
                </tr>
            `;
            
        }

    }

    initDocumentClick(){

        // Permet de faire disparaitre les textarea et faire apparaitre les span lorsqu'on clique n'importe ou sur la page
        document.addEventListener('click', ()=>{

            for(let t of document.querySelectorAll('.textarea-address')){
                t.style.display = 'none';
            }

            for( let span of document.querySelectorAll('.address')){
                span.style.display = 'inline';
            }   

            for(let t of document.querySelectorAll('.textarea-city')){
                t.style.display = 'none';
            }

            for( let span of document.querySelectorAll('.city')){
                span.style.display = 'inline';
            }   

        })        
    }

    initTable(){

        this.initSpanCity();
        this.initTextareaCity();
        this.initSpanAddress();
        this.initTextareaAddress();
        this.initBtnDeleteEstate();
        this.initInputFileImage();
        this.initDocumentClick();

    }

    initSpanCity(){
        /**** City */
        
        for( let span of this.spans_city){
        
            span.addEventListener('click', (event)=>{
                event.stopPropagation();
                event.target.style.display = 'none';
                event.target.nextElementSibling.style.display = "inline-block";
        
            })
        
        }
    }

    initTextareaCity(){
        for( let t of this.textarea_city){
            t.style.display = 'none';
            t.previousElementSibling.style.display = 'block';
            t.addEventListener('click', (e)=>{
                e.stopPropagation();
            });
        
            t.addEventListener('keyup', (event)=>{
        
                if( event.keyCode === 13 ){
                    event.target.value = event.target.value.replace('\n', '');
                    event.target.style.display = 'none'; // Le textarea disparait
                    event.target.previousElementSibling.style.display = 'inline'; // On fait apparaitre l'adresse dans le span
                }else{
                    event.target.previousElementSibling.innerText = event.target.value; // Dans le span on met le contenu du textarea
                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', `${host}update-city.php`)
                    xhr.responseType = 'text';
        
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
                    let city = event.target.value;
        
                    let id = parseInt(event.target.id.replace('textarea-city', ''));
        
                    xhr.send(`city=${city}&id=${id}`);
        
                    xhr.addEventListener('onload', ()=>{
                        console.log(event.target.responseText);
                    })
        
                }
            })
        
        }
    }

    initSpanAddress(){
        for( let span of this.spans_address){
    
            span.addEventListener('click', (event)=>{
                event.stopPropagation();
                event.target.style.display = 'none';
                event.target.nextElementSibling.style.display = "inline-block";
        
            })
        
        }
    }

    initTextareaAddress(){
        for( let t of this.textearea_address){
            t.style.display = 'none';
            t.previousElementSibling.style.display = 'block';
            t.addEventListener('click', (e)=>{
                e.stopPropagation();
            });
    
            t.addEventListener('keyup', (event)=>{
    
                if( event.keyCode === 13 ){
                    event.target.value = event.target.value.replace('\n', '');
                    event.target.style.display = 'none'; // Le textarea disparait
                    event.target.previousElementSibling.style.display = 'inline'; // On fait apparaitre l'adresse dans le span
                }else{
                    
                    event.target.previousElementSibling.innerText = event.target.value;
    
                    let xhr = new XMLHttpRequest();
    
                    xhr.open('POST', `${host}update-address.php`)
    
                    xhr.responseType = 'text';
    
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
                    let address = event.target.value;
    
                    let id = parseInt(event.target.id.replace('textarea-address', ''));
    
                    xhr.send(`address=${address}&id=${id}`);
    
                    xhr.addEventListener('onload', (event)=>{
                        console.log(event.target.responseText);
                    })
    
                }
            })
    
        }
    }

    initBtnDeleteEstate(){
        for(let formsup of this.btn_delete_estate){
    
            formsup.addEventListener('click', (event)=>{
    
                let id_estate = parseInt(event.target.getAttribute('data-id-estate'));
    
                // On peut faire une requete ajax avec l'api fetch
    
                let xhr = new XMLHttpRequest();
    
                xhr.open('POST', `${host}delete-estate.php`);
    
                xhr.responseType = 'json';
    
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
                xhr.send(`id_estate=${id_estate}`);
    
                xhr.onload = (event)=>{
    
                    this.generate(event.target.response.biens); // On régénère le contenu du tbody
                    this.reloadElements(); // On récupère les nouveaux éléments HTML pour les mettre dans les propriétés de la classe
                    this.initTable(); // On régénère les actions javascript du nouveau contenu de tbody
    
                }
    
    
        
            })
    
        }
    }

    initInputFileImage(){
        /******** Upload des images en AJAX */
    
        // On parcours tout les input file qui servent à charger les images
        for(let inputFileImg of this.input_file_img){ 
    
            // L'évênement change s'éxécute lorsqu'on sélectionne un fichier avec le inout file
            inputFileImg.addEventListener('change', (event)=>{
    
                // On récupère l'id du bien immobilier qui est stocké dans le input hidden juste à coté de l'input file
                let id_bien = parseInt(event.target.nextElementSibling.value);
                // FormData est une classe qui permet de stocker des données de formulaire à envoyer
                // FOrmaData est obligatoire quand on veut envoyer des fichiers
                let formData = new FormData();
                // On met notre fichier image stocké dans le cache du navigateur dans formdata
                formData.append('image', event.target.files[0])
                // 
                formData.append('id_bien', id_bien);
    
                fetch(`${host}update-image.php`,
                {
                    method: 'POST',
                    body: formData,
                }).then((response)=>{
                    console.log(response);
                    return response.json();
                }).then((filename)=>{
                    document.querySelector('#img-upload'+id_bien).src = `${host}img/${filename}`;
                }).catch((error)=>{
                    console.log(error)
                })
            })
    
        }
    }

}