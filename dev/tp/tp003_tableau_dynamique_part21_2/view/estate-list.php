<span id="message-serveur"></span>
<h1>Les biens immobiliers</h1>
<!-----------------------------Form------------------------------------>

<div id="black-screen">
    <form action="" method="POST" class="mb-4" id="form1">
        <h2>Ajouter un bien</h2>
        <div class="form-group">
            <label for="nom"></label>
            <input type="text" id="nom" class="form-control" name="name" placeholder="Nom">
            <span id="msg-nom"></span>
        </div>
        <div class="form-group">
            <label for="prix"></label>
            <input type="text" id="prix" class="form-control" name="price" placeholder="Prix">
            <span id="msg-prix"></span>
        </div>
        <div class="form-group">
            <label for="ville"></label>
            <input type="text" id="ville" class="form-control" name="city" placeholder="Ville">
            <span id="msg-ville"></span>
        </div>
        <div class="form-group">
            <label for="adresse"></label>
            <input type="text" id="adresse" class="form-control" name="address" placeholder="Adresse">
            <span id="msg-adresse"></span>
        </div>
        <button type="submit" class="btn btn-success mt-3">Ajouter</button>
    </form>    
</div>

<!----------------------------------------------------------------->

<form action="" method="POST" class="mb-4" id="form-city">
    <div class="form-group">
        <input type="text" class="form-control" name="city-filter" id="input-city-filter" placeholder="Rechercher par ville">
    </div>
    <button type="submit" class="btn btn-primary">Rechercher</button>
</form>

<!----------------------------------------------------------------->

<div class="btn btn-warning float-end" id="add-good">Ajouter un bien</div>
<input type="text" id="page_actuelle">
<img src="img/arrow-right.png" id="img-next" alt="" style="border:1px solid black;width:30px;height:30px;float:right;margin-top:50px;cursor:pointer;">
<img src="img/arrow-left.png" id="img-previous" alt="" style="border:1px solid black;width:30px;height:30px;float:left;margin-top:50px;cursor:pointer;">
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th></th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Adresse</th>
                <th>Image</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="biens">

        </tbody>
    </table>    
</div>

<!----------------------------------------------------------------->