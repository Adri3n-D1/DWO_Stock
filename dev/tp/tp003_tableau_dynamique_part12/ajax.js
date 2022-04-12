let tbody = document.getElementById('table-content');

function init() {
    getProperties();
    initPopupEvent();
}

function initInputEvent() {
    // Un clique sur un label le cache et on affiche à la place un text-area
    let labels = document.getElementsByClassName('label');
    for (let label of labels) {
        label.addEventListener('click', function(event) {
            closeAllInput();
            event.stopPropagation();
            this.style.display = 'none';
            this.nextElementSibling.style.display = 'block';
        });
    }

    // Un clique sur le document ferme les inputs
    document.addEventListener('click', function(event) {
            closeAllInput();
    });

    
    let inputs = document.getElementsByClassName('text-area');
    for (let input of inputs) {
        // Un clique sur un input ne doit rien faire
        input.addEventListener('click', function(event) {
            event.stopPropagation();
        });
        // Une valeur d'un input qui change doit mettre à jour la bdd
        input.addEventListener('change', function(event) {
            let propertyId = this.parentElement.parentElement.id;
            let propertyValue = this.value;

            let propertyColumn = '';
            if (this.classList.contains('name')) {
                propertyColumn = 'name';
            }
            else if (this.classList.contains('price')) {
                propertyColumn = 'price';
            }
            else if (this.classList.contains('city')) {
                propertyColumn = 'city';
            }
            else if (this.classList.contains('address')) {
                propertyColumn = 'address';
            }
            
            updateProperty(propertyId, propertyColumn, propertyValue);
        });
    }
}

function initPopupEvent() {
    // Un clique sur l'exterieur du formulaire ferme la popup
    document.getElementById('popup-container').addEventListener('click', function(event) {
        hidePopup();
    });
    // Un clique sur le formulaire ne fait rien
    document.getElementById('popup-content').addEventListener('click', function(event) {
        event.stopPropagation();
    });
    // Soumettre le formulaire vérifie les données et les envoient ou non
    document.getElementById('popup-form').addEventListener('submit', function(event) {
        event.preventDefault();
        if (analysisData()) {
            addProperty();
        }
    });
}

function closeAllInput() {
    /* Ferme tous les inputs */
    let inputs = document.getElementsByClassName('text-area');
    for (let input of inputs) {        
        input.style.display = 'none';
        input.previousElementSibling.style.display = 'block';
    }
}

function getProperties(limit=20, offset=0) {
    let action = 'getproperties';
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'bdd.php');
    xhr.responseType = 'json';

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(`action=${action}&limit=${limit}&offset=${offset}`);

    xhr.onreadystatechange  = function(event) {
        if (this.readyState == 4 && this.status == 200) {
            showProperties(this.response['result']);
        }
    };
}

function addProperty() { 
    let action = 'addproperty';  
    let name = document.getElementById('form-new-name').value;
    let price = document.getElementById('form-new-price').value;
    let city = document.getElementById('form-new-city').value;
    let address = document.getElementById('form-new-address').value;

    let xhr = new XMLHttpRequest();
    xhr.open('post', 'bdd.php');
    xhr.responseType = 'json';
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(`action=${action}&name=${name}&price=${price}&city=${city}&address=${address}`);

    let dial = document.getElementById('dial');
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.response['success']) {
                dial.style.color = '#01d758';
                getProperties();
                document.getElementById('form-new-name').value = '';
                document.getElementById('form-new-price').value = '';
                document.getElementById('form-new-city').value = '';
                document.getElementById('form-new-address').value = '';
            }
            else {
                dial.style.color = '#ff0921';
            }
            dial.innerText = this.response['dial'];
        }
        hidePopup();
    };
}

function showPopup() {
    document.getElementById('popup-container').style.display = 'flex';
}

function hidePopup() {
    document.getElementById('popup-container').style.display = 'none';
}

function analysisData() {
    let name = document.getElementById('form-new-name').value;
    let price = document.getElementById('form-new-price').value;
    let city = document.getElementById('form-new-city').value;
    let address = document.getElementById('form-new-address').value;

    return true;
}

function updateProperty(id, column, value) {
    let action = 'updateproperty'; 
    let xhr = new XMLHttpRequest();
    xhr.open('post', 'bdd.php');
    xhr.responseType = 'json';
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(`action=${action}&id=${id}&column=${column}&value=${value}`);

    let dial = document.getElementById('dial');
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response)
            if (this.response['success']) {
                dial.style.color = '#01d758';
                getProperties();
            }
            else {
                dial.style.color = '#ff0921';
            }
            dial.innerText = this.response['dial'];
        }
    };

}
// function deleteProperty() {

// }

function showProperties(properties) {
    let html = '';
    for (let property of properties) {
        html += `
        <tr id="${property['id']}">
            <td>${property['id']}</td>
            <td>
                <span class="label">${property['name']}</span>
                <textarea class="name text-area">${property['name']}</textarea>
            </td>
            <td>
                <span class="label">${property['price']}</span>
                <textarea class="price text-area">${property['price']}</textarea>
            </td>
            <td>
                <span class="label">${property['city']}</span>
                <textarea class="city text-area">${property['city']}</textarea>
            </td>
            <td>
                <span class="label">${property['address']}</span>
                <textarea class="address text-area">${property['address']}</textarea>
            </td>
            <td>
                <form action="" method="POST">
                    <input type="hidden" name="item-to-remove" value="${property['id']}">
                    <input type="submit" class="btn btn-danger" value="Supprimer">
                </form>
            </td>
        </tr>
        `;
    }
    tbody.innerHTML = html;
    initInputEvent();
}

init();