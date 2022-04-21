import {host, send} from '../data.js';

export default class pagination{

    constructor(btn_next, btn_previous, input_select_page, table){
        this.btn_next = btn_next;
        this.btn_previous = btn_previous;
        this.input_select_page = input_select_page;
        this.table = table;
        this.page = 0;
    }

    initBtnsPagination(){

        this.btn_next.addEventListener('click', (e)=>{

            let data = {
                url: `${host}pagination.php`,
                method: 'post',
                responseType: 'json',
                data: {
                    page: this.page,
                    step: 'next'
                },
            }

            send(data).onload = (event)=> {
        
                document.querySelector('#img-previous').style.display = 'inline-block';
        
                if(this.page < parseInt(event.target.response.nb_page) - 1){
                    this.page++;
                }else{
                    this.page = event.target.response.nb_page - 1;
                    e.target.style.display = 'none';
                }
        
                if(this.page == parseInt(event.target.response.nb_page) - 1){
                }
        
                this.table.generate(event.target.response.list); 
                this.table.initTable();
        
            }
        
        });
        
        
        this.btn_previous.addEventListener('click', (e)=>{
        
            let xhr = new XMLHttpRequest();
        
            xhr.open('POST', `${host}pagination.php`);
        
            xhr.responseType = 'json';
        
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
            xhr.send(`page=${this.page}&step=previous`);
        
            xhr.onload = (event)=>{
        
                document.querySelector('#img-next').style.display = 'inline-block';
                if(this.page > 0){
                    this.page--;
                }else{
                    this.page = 0;
                }
        
                if(this.page == 0){
                    e.target.style.display = 'none';
                }
                
                this.table.generate(event.target.response.list); 
                this.table.initTable();
        
            }
        
        
        });
    }

    initInputPagination(){
        this.input_select_page.addEventListener('keyup', (event)=>{

            let page_selected = event.target.value;
        
            
            if(page_selected != ''){
        
                    let xhr = new XMLHttpRequest();
        
                    xhr.open('POST', `${host}pagination.php`);
                
                    xhr.responseType = 'json';
                
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                
                    xhr.send(`page_selected=${page_selected}`);
                
                    xhr.onload = (event)=>{
        
                        if(page_selected <= event.target.response.nb_page){
                            this.page = page_selected;
                            this.table.generate(event.target.response.list); 
                            this.table.initTable();
                        }
        
                    }
        
            }
            
        });
    }

}