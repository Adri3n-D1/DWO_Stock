import {host} from '../data.js';

export default class AddEstate {

    constructor(elements, inputs, messages){

        this.form = elements.form;
        this.add_good_btn = elements.add_good_btn;
        this.black_screen = elements.black_screen;
        this.server_msg = elements.server_msg;

        this.nom = inputs.nom;
        this.prix = inputs.prix;
        this.ville = inputs.ville;
        this.adresse = inputs.adresse;

        this.msg_nom = messages.nom;
        this.msg_prix = messages.prix;
        this.msg_ville = messages.ville;
        this.msg_adresse = messages.adresse;
    }

    initPopup(){

        this.add_good_btn.addEventListener('click', ()=>{
            document.querySelector('#black-screen').style.display = 'flex';
        });
        
        this.black_screen.addEventListener('click', (event) => {
            event.target.style.display = 'none';
        });

    }

    initForm(){

        this.form.addEventListener('click', (event) => {
            event.stopPropagation();
        });
        
        this.form.addEventListener('submit', (event)=>{
        
            event.preventDefault();
            
            if( /[a-z]+/ig.test(this.nom.value) == false ){
                this.msg_nom.innerText = 'Veuillez saisir un nom correct';
                return false;
            }  
            
            if( /[0-9]+/.test(this.prix.value) == false ){
                this.msg_prix.innerText = 'Veuillez saisir un prix correct';
                return false;
            }
            if( /[a-z]+/ig.test(this.ville.value) == false ){
                this.msg_ville.innerText = 'Veuillez saisir une ville correcte';
                return false;
            }
            if( /[a-z0-9]+/ig.test(this.adresse.value) == false ){
                this.msg_adresse.innerText = 'Veuillez saisir une adresse correcte';
                return false;
            }
        
            // Code a éxécuter lorsque le formulaire est bien remplis
        
            let xhr = new XMLHttpRequest();
            xhr.open('POST', `${host}addBien`);
            xhr.responseType = 'text';
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send(`name=${this.nom.value}&price=${this.prix.value}&city=${this.ville.value}&address=${this.adresse.value}`);
        
            xhr.onload = (event)=>{
                console.log(event.target.response);
                // Faire disparaitre la popup du formulaire
                this.black_screen.style.display = 'none';
                this.server_msg.innerText = event.target.response;
            }
        
        })
    }
}



