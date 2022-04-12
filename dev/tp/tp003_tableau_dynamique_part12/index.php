<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="ajax.js" defer></script>
    <title>TP - Tableau Dynamique</title>
</head>
<body class="container">
    <h1>Les biens immobiliers</h1>
    <span id="dial"></span>
<!---------------------------------- Popup ---------------------------------->
    <div id="popup-container" style="display: none">
        <div id="popup-content">
            <h2>Ajouter un bien</h2>
            <form id="popup-form" action="index.php" method="POST">
                <input type="text" class="form-control mb-3" id="form-new-name" name="form-new-name" placeholder="Nom">
                <input type="text" class="form-control mb-3" id="form-new-price" name="form-new-price" placeholder="Prix">
                <input type="text" class="form-control mb-3" id="form-new-city" name="form-new-city" placeholder="Ville">
                <input type="text" class="form-control mb-3" id="form-new-address" name="form-new-address" placeholder="Adresse">
                <button type="submit" class="btn btn-success mb-3">Ajouter</button>
            </form>
        </div>
    </div>
<!---------------------------- Button add-bien ------------------------------>
    <form action="index.php" method="POST">
        <div class="mb-3">
            <input type="text" class="form-control mt-5" name="form-target-city" placeholder="Rechercher par ville">
        </div>
        <div class="d-flex justify-content-between">
            <input type="submit" class="btn btn-primary" value="Rechercher">
            <div id="popup-btn" onclick="showPopup()" class="btn btn-warning">Ajouter un bien</div>
        </div>
    </form>
<!----------------------------- Paginaton Arrow ----------------------------->
    <div class="d-flex justify-content-between">
        <a href="index.php?action=previous"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg></a>
        
        <a href="index.php?action=next"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg></a>
    </div>
<!--------------------------- Tableau Bootstrap ----------------------------->
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prix</th>
            <th scope="col">Ville</th>
            <th scope="col">Adresse</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="table-content">
        </tbody>
    </table>
</body>
<!--------------------------------------------------------------------------->
<!-- <script>
    function showLabel() {
        /* Show span and hide textarea */        
        for (element of document.getElementsByClassName('label')) {
            element.style.display = 'block';
            element.nextSibling.style.display = 'none';
        }
    }

    function sendRequest(id, value, valueName) {
        /* Send a request to the server to modify a specified column in the database */
        
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'serveur.php');
        xhr.responseType = 'text';
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send(`id=${id}&${valueName}=${value}`);
    }

    function showPopup() {
        /* display the popup */
        if (document.getElementById('popup-container').style.display == 'none') {
            document.getElementById('popup-container').style.display = 'flex';
        }
    }
    
    function hidePopup() {
        /* hide the popup */
        if (document.getElementById('popup-container').style.display == 'flex') {
            document.getElementById('popup-container').style.display = 'none';
        }
    }
    
    function initPage() {
        let tbody = document.getElementById('table-content');
        let html = '';
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'get-biens.php');
        xhr.responseType = 'json';
        xhr.send();
        xhr.onload = function(event) {
            if (this.status == 200) {

                for(let row of this.response) {
                    html += '<tr>';

                    // td id
                    html += `<td>${row['id']}</td>`;
                    // td name
                    html += `<td><span class="label">${row['name']}</span><textarea id="name-${row['id']}" class="name text-area">${row['name']}</textarea></td>`;
                    // td price
                    html += `<td><span class="label">${row['price']}</span><textarea id="price-${row['id']}" class="price text-area">${row['price']}</textarea></td>`;
                    // td city
                    html += `<td><span class="label">${row['city']}</span><textarea id="city-${row['id']}" class="city text-area">${row['city']}</textarea></td>`;
                    // td address
                    html += `<td><span class="label">${row['address']}</span><textarea id="address-${row['id']}" class="address text-area">${row['address']}</textarea></td>`;
                    // td delete entry
                    html += 
                        `<td><form action="" method="POST">
                        <input type="hidden" name="item-to-remove" value="${row['id']}">
                        <input type="submit" class="btn btn-danger" value="Supprimer">
                        </form></td>`;

                    html += '</tr>';
                }
                tbody.innerHTML = html;
                initEvent();
            }
        }
    }
    
    function initEvent() {
        /* Overload the events, should be call to init */
        document.addEventListener('click', function() {        
            showLabel();
        });

        for (element of document.getElementsByClassName('label')) {
            element.addEventListener('click', function(event) {
                event.stopPropagation();
                showLabel();
                event.target.style.display = 'none';
                event.target.nextSibling.style.display = 'block';
            });
        }

        for (element of document.getElementsByClassName('text-area')) {
            // Click's event
            element.addEventListener('click', function(event) {
                event.stopPropagation();
            });
            // Keydown's event
            element.addEventListener('keydown', function(event) {
                if (event.keyCode === 13) {
                    console.log(event.target.value);
                    event.target.previousSibling.text = event.target.value;
                    console.log("touche Entrer");
                    updateData(this);
                    showLabel();
                }
            });
            // Change's event
            element.addEventListener('input', function(event) {
                updateData(this);
            });
        }

        document.getElementById('popup-container').addEventListener('click', () => {
            hidePopup();
        });

        document.getElementById('popup-content').addEventListener('click', (event) => {
            event.stopPropagation();
        });

        document.getElementById('popup-form').addEventListener('submit', (event) => {
            event.preventDefault();
            addBiens();
            hidePopup();
            initPage();
        });
    }

    function updateData(element) {
        let valueName = '';
        if (element.classList.contains('name')) {
            valueName = 'name';
        }
        else if (element.classList.contains('price')) {
            valueName = 'price';
        }
        else if (element.classList.contains('city')) {
            valueName = 'city';
        } 
        else if (element.classList.contains('address')) {
            valueName = 'address';
        } 

        event.target.value = event.target.value.replaceAll('  ', ' ');
        event.target.value = event.target.value.replaceAll('\n', ' ');

        let id = parseInt(element.id.replace(`${valueName}-`, ''));
        let value = element.value;

        element.previousSibling.innerText = value;
        sendRequest(id, value, valueName);
    }  

    function addBiens() {
        console.log("ADDBIEN");
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'add-bien.php');
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.responseType = 'json';

        let name = document.getElementById('form-new-name').value;
        let price = document.getElementById('form-new-price').value;
        price = price.replaceAll(' ', '');
        let city = document.getElementById('form-new-city').value;
        let address = document.getElementById('form-new-address').value;

        xhr.send(`name=${name}&price=${price}&city=${city}&address=${address}`);

        if (xhr.status == 200) {
            console.log(xhr.response == true);
        }
    }

    initPage();
</script> -->

<style>
    td {
        position: relative;
        height: max-content;
    }
    .text-area {
        display: none;
        position: absolute;
        width: 100%;
        top: 0;
        left: 0;
        border:0;
        overflow: hidden;
    }
    #popup-container {
        background-color: #ccccccaa;
        position: fixed;
        width: 100%;
        height: 100vh;
        top: 0;
        left: 0;
        z-index: 2;

        justify-content: center;
        align-items: center;
    }
    #popup-container #popup-content {
        box-sizing: border-box;
        padding: 30px 15px 15px;
        background-color: #fff;
    }
    #dial {
        color: green;
    }
</style>
</html>