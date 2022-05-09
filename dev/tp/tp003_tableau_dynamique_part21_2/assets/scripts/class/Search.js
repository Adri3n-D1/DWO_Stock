import {host} from '../data.js';

export default class Search{

    constructor(form_city, input_city_filter, table){

        this.form_city = form_city;
        this.input_city_filter =    input_city_filter;
        this.table = table;

    }

    initFormSearch(){
        //******** Code de récupération des biens filtrés par la ville saisie */
        this.form_city.addEventListener('submit', (event)=>{

            event.preventDefault();
        
            let city = this.input_city_filter.value;
        
            console.log(city);
            if(city != ''){
        
                let xhr = new XMLHttpRequest();
                xhr.open('POST', `${host}get-biens`);
                xhr.responseType = 'json';
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.send(`city-filter=${city}`);

                xhr.onload = (event)=>{
                    this.table.generate(event.target.response); 
                    this.table.initTable();
                }
        
            }
        
        });
    }



}