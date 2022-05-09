import Table from './class/Table.js';
import Search from './class/Search.js';
import AddEstate from './class/AddEstate.js';
import Pagination from './class/Pagination.js';

document.addEventListener('DOMContentLoaded', function(){

/** Initialisation du tableau avec tout ses évênements js **/
let tbody = document.querySelector('#biens');
let table = new Table(tbody);
table.initTableContent();

/** Initialisation du formulaire de recherche par ville **/
let form_city = document.querySelector('#form-city');
let input_city_filter =  document.querySelector('#input-city-filter');
let search = new Search(form_city, input_city_filter, table);
search.initFormSearch(); // Initialise les évênements du formulaire de recherche par ville

/** Initialisation du formulaire d'ajout de bien immobilier **/


let elements = {
    form: document.querySelector('#form1'),
    add_good_btn: document.querySelector('#add-good'),
    black_screen: document.querySelector('#black-screen'),
    server_msg: document.querySelector('#message-serveur')
}

let inputs = {
    nom: document.querySelector('#nom'),
    prix: document.querySelector('#prix'),
    ville: document.querySelector('#ville'),
    adresse: document.querySelector('#adresse')
}

let messages = {
    nom: document.querySelector('#msg-nom'),
    prix: document.querySelector('#msg-prix'),
    ville: document.querySelector('#msg-ville'),
    adresse: document.querySelector('#msg-adresse')
}

let addEstate = new AddEstate(elements, inputs, messages);
addEstate.initPopup(); // Initialise l'affichage de la popup lors du click sur le bouton 'Ajouter'
addEstate.initForm();

/** Pagination **/

let btn_next = document.querySelector('#img-next');
let btn_previous = document.querySelector('#img-previous');
let input_select_page = document.querySelector('#page_actuelle');

let pagination = new Pagination(btn_next, btn_previous, input_select_page, table);

/** Initialisation des boutons de pagination **/
pagination.initBtnsPagination();

/** Initialisation de l'input de pagination **/
pagination.initInputPagination();



});