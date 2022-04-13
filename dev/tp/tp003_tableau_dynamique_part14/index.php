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
    <div class="paging-panel d-flex justify-content-between">
        <span id="arrow-previous-page"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ff0000" class="bi bi-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg></span>
        <p id=paging-show></p>
        <span id="arrow-next-page"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ff0000" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg></span>
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

<style>
    .paging-panel {
        background-color: #0000005a;
        padding: 2px 20px;
        border-radius: 15px;
        margin: 15px 0;
    }
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