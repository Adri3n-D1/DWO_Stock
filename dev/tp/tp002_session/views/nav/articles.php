<?php
$titleTabPage = 'Articles';
$titlePage = 'Liste des articles';

ob_start();
?>
<div class="card col-4">
    <img src="img/art_1.jpg" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">Les chats</h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis commodi, minima quam ipsa est voluptatum?</p>
    </div>
</div>
<div class="card col-4">
    <img src="img/art_2.jpg" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">Les chiens</h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta necessitatibus nihil placeat ad obcaecati laborum illo dolore incidunt similique sed.</p>
    </div>
</div>
<div class="card col-4">
    <img src="img/art_3.jpg" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">Les oiseaux</h5>
        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta sint recusandae, ea tempora velit accusamus tenetur voluptatem enim.</p>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once 'views/template.php';
?>
