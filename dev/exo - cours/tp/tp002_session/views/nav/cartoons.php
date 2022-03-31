<?php
$titleTabPage = 'Dessins animés';
$titlePage = 'Liste des dessins animés';

ob_start();
?>
<div class="card col-4">
    <img src="img/da_1.jpg" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">Le roi lion</h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos perferendis, hic eveniet amet magni mollitia cumque? Eius repellat repudiandae at, nulla accusantium reprehenderit? Ipsa expedita beatae ex saepe repellat perspiciatis hic. Illo facilis provident consequatur tempora cumque rerum necessitatibus eius officiis doloremque fugit ea maiores sequi cum iste, quod consectetur placeat commodi quae beatae blanditiis. Atque asperiores voluptate et non.</p>
    </div>
</div>
<div class="card col-4">
    <img src="img/da_2.jpg" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">Le livre de la jungle</h5>
        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse quam culpa quia accusantium error deserunt ipsum minima et quod porro! Nesciunt necessitatibus temporibus voluptatum sapiente reiciendis et iste assumenda placeat nulla tempore! Repudiandae quam, cum corporis vitae totam eveniet officia repellat et magni, consequatur tempora voluptas ea. Blanditiis, amet laboriosam?</p>
    </div>
</div>
<div class="card col-4">
    <img src="img/da_3.jpg" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">La reine des neiges</h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, quod? Dignissimos nihil quod sit adipisci culpa quia vero perferendis fuga natus odio quisquam, impedit veniam consequuntur possimus dolorem modi id.</p>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once 'views/template.php';
?>
