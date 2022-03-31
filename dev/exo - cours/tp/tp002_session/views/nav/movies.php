<?php
$titleTabPage = 'Films';
$titlePage = 'Liste des films';

ob_start();
?>
<div class="card col-4">
    <img src="img/film_1.jpg" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">Reservoir dogs</h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt magni, ipsa ea pariatur unde praesentium deserunt perferendis asperiores fugiat itaque similique, consequatur obcaecati. Quae, nemo odit eum commodi beatae id laboriosam earum nulla tenetur adipisci saepe sapiente non tempora dolorum. Quod, explicabo. Voluptatum neque alias ut tenetur provident sed porro?</p>
    </div>
</div>
<div class="card col-4">
    <img src="img/film_2.jpg" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">Man on fire</h5>
        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit hic quo alias dolore veniam ab, ullam perspiciatis earum totam libero? Eos eius alias cum odit assumenda tempora in perspiciatis atque eveniet repellendus. Cumque laboriosam iusto a quibusdam, dolorum reiciendis facere cupiditate eius error, iure neque?</p>
    </div>
</div>
<div class="card col-4">
    <img src="img/film_3.jpg" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">Avatar</h5>
        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum assumenda fuga perferendis libero sed voluptatum architecto ratione aperiam numquam veritatis nam doloremque nesciunt eveniet pariatur delectus necessitatibus provident at dolore molestias, cupiditate placeat ad! Tempora nesciunt provident ullam cupiditate suscipit velit cumque soluta porro tenetur itaque ut architecto, doloribus aperiam.</p>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once 'views/template.php';
?>
