let tbody = document.getElementById('table-content');
let page = 0;
let maxPage = 0;
let limit = 20;

function init() {
    getProperties();
    initFilterEvent();
    initPopupEvent();
    initArrowEvent();
    getMaxPage();
}

function initInputEvent() {
    // Un clique sur un label le cache et on affiche à la place un text-area
    let labels = document.getElementsByClassName('label');
    for (let label of labels) {
        label.addEventListener('click', function(event) {
            closeAll();
            event.stopPropagation();
            this.style.display = 'none';
            this.nextElementSibling.style.display = 'block';
        });
    }
    
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
    
    // Un envoi de formulaire delete-property
    let formsDelete = document.getElementsByClassName('delete-property');
    for (let form of formsDelete) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            let propertyId = event.target.parentElement.parentElement.id;
            deleteProperty(propertyId);
        });
    }

    // Un clique sur le label de pagination le cache et affiche son input
    let paginationLabel = document.getElementById('paging-label');
    paginationLabel.addEventListener('click', function(event) {
        event.target.style.display = 'none';
        event.target.nextElementSibling.style.display = 'block';
        event.stopPropagation();
    });

    // Un changement de valeur de l'input de pagination le traite, le cache et affiche son label
    let paginationInput = document.getElementById('paging-input');
    paginationInput.addEventListener('change', function(event) {
        // this.style.display = 'none';
        // this.previousElementSibling.style.display = 'block';
        pageSelected(this.value-1);
    });
    paginationInput.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    // Un clique sur le document ferme les inputs
    document.addEventListener('click', function(event) {
        closeAll();
        paginationLabel.style.display = "block";
        paginationLabel.nextElementSibling.style.display = "none";
    });

    // L'image n'apparaît qu si son src est renseigné
    let formsAddPhoto = document.getElementsByClassName('set-photo');
    for (let formAddPhoto of formsAddPhoto) {
        if (formAddPhoto.nextElementSibling != null) {
            formAddPhoto.style.display = 'none';
        }
    }

    // Un clique sur l'image fait appaître le formulaire
    let images = document.getElementsByClassName('img-property');
    for (let image of images) {
        image.addEventListener('click', function(event) {
            image.style.display = 'none';
            image.previousElementSibling.style.display = 'block';
            event.stopPropagation();
        });
    }

}

function initFilterEvent() {
    let form = document.getElementById('form-filter');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        let fiterValue = form.target.value;
        getProperties(fiterValue);
    })
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

function initArrowEvent() {
    let arrowPrevious = document.getElementById('arrow-previous-page');
    arrowPrevious.addEventListener('click', function(event) {        
        getMaxPage(previousPage);

    });
    let arrowNext = document.getElementById('arrow-next-page');
    arrowNext.addEventListener('click', function(event) {
        getMaxPage(nextPage);
    });
}

function closeAll() {
    /* Ferme tous les inputs */
    let inputs = document.getElementsByClassName('text-area');
    for (let input of inputs) {        
        input.style.display = 'none';
        input.previousElementSibling.style.display = 'block';
    }
    
    let images = document.getElementsByClassName('img-property');
    for (let image of images) {
        image.style.display = 'block';
        image.previousElementSibling.style.display = 'none';
    }
}

function getProperty() {
    let action = 'getproperty';
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'bdd.php');
    xhr.responseType = 'json';

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(`action=${action}&limit=${limit}&offset=${Math.ceil(limit*(page))}`);

    xhr.onreadystatechange  = function(event) {
        if (this.readyState == 4 && this.status == 200) {
            showProperties(event.target.response['result']);
        }
    };
}

function getProperties(filter=false) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'bdd.php');
    xhr.responseType = 'json';

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    if (filter) {
        let action = 'getpropertiesbycity';
        xhr.send(`action=${action}&filterCity=${filter}`);
        console.log(document.getElementById('paging-panel'))
        document.getElementById('paging-panel').style.display = 'none';
    }
    else {
        let action = 'getproperties';
        xhr.send(`action=${action}&limit=${limit}&offset=${Math.ceil(limit*(page))}`);
        document.getElementById('paging-panel').style.display = 'flex';

        getMaxPage(refreshPaging);
    }

    xhr.onreadystatechange = function(event) {
        if (event.target.readyState == 4 && event.target.status == 200) {
            showProperties(event.target.response['result']);
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

function deleteProperty(propertyId) {
    let action = 'deleteproperty';
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'bdd.php');
    xhr.responseType = 'json';
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(`action=${action}&id=${propertyId}`);

    let dial = document.getElementById('dial');
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
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
                <form action="upload_img.php" method="POST" class="set-photo"  enctype="multipart/form-data">
                    <input type="hidden" name="img-id" value="${property['id']}">
                    <input type="file" name="img">
                    <input type="submit">
                </form>`;

            if (property['img']) {
                html += `<img class="img-property" src="${property['img']}" alt="image du bien immobilier">`;
            }

            html += `
                </td>
                <td>
                    <form class="delete-property">
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

function getMaxPage(callback=null) {
    let action = 'getnbpage';
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'bdd.php');
    xhr.responseType = 'json';
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(`action=${action}&limit=${limit}`);

    let dial = document.getElementById('dial');
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.response['success']) {
                dial.style.color = '#01d758';
                maxPage = this.response['result'];
                if (callback != null) {
                    callback();
                }
            }
            else {
                dial.style.color = '#ff0921';
            }
            dial.innerText = this.response['dial'];
        }
    };
}

function refreshPaging() {
    let pagingLabel = document.getElementById('paging-label');
    pagingLabel.innerText = Math.ceil(page)+1 + '/' + (maxPage+1);
    document.getElementById('paging-input').value = Math.ceil(page)+1;
}

function previousPage() {
    if (page <= 0) {
    }
    else {
        page--;
        getProperties();
    }
}

function nextPage() {
    if (page >= maxPage) {
    }
    else {
        page++;
        getProperties();
    }
}

function pageSelected(numberPage) {
    if (numberPage >= 0 && numberPage <= maxPage) {
        page = numberPage;
        getProperties();
    }
}

init();