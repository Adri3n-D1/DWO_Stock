<?php
    $hardSkill = [
        'html5', 'css3', 'bootstrap', 'javascript', 'wordpress', 'php', 'mysql', 'jquery',
    ];
    $exp = [
        ['Formation développeur web et mobile',
            ['De Janvier à Octobre 2022',
            'HTML, CSS, Bootstrap, JS, JQuery',
            'PHP, Symfony, MySQL',
            'Maquettage de site',
            ],
        ],
        ['Apprentissage en autodidact',
            ['Jusqu\'à 2022',
            'HTML & CSS - MOOC sur Openclassrom.com',
            'PHP, MySQL - MOOC sur Openclassroom.com',
            'Architecture MVC - MOOC sur Openclassroom.com',
            'Python3 - MOOC sur Funmooc',
            ],
        ],
    ]
?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    
    <link rel='stylesheet' type='text/css' href='style_fonts.css'>
    <link rel='stylesheet' type='text/css' href='style_base.css'>
    <link rel='stylesheet' type='text/css' href='style_header.css'>
    <link rel='stylesheet' type='text/css' href='style_quote.css'>
    <link rel='stylesheet' type='text/css' href='style_hardskills.css'>
    <link rel='stylesheet' type='text/css' href='style_about.css'>
    <link rel='stylesheet' type='text/css' href='style_board.css'>
    <link rel='stylesheet' type='text/css' href='style_contact.css'>
    <link rel='stylesheet' type='text/css' href='style_footer.css'>

    <script type="text/javascript" src="form_validation.js" defer></script>

    <title>Adrien Delcros - Site C.V.</title>
</head>
<body>
    <!-- Part HEADER -->
    <header>
        <nav class="">
            <a class='link-menu' href='javascript:void(0);' onclick='toogleMenu()'><img class="svg svg-light" src='img/menu-burger2.svg' alt=''></a>
            <div id='menu-nav'>
                <a href="#"><img class="svg svg-white" src="img/home.svg" alt="Lien vers l'accueil"></a>
                <a href="#">Moi</a>
                <a href="#">Mes Compétences</a>
                <a href="#">Mon Experience</a>
                <a href="#">Me Contacter</a>
            </div>
        </nav>            
    </header>
    <!-- Part INTRO -->
    <section class='introduction-section'>
        <div class="page-content">
            <p class='name'>ADRIEN DELCROS</p>
            <p class='slogan'>Créateur du<br>web</p>
            <div class='row-button'>
                <a class='button contact' href='#contact'>Contactez-moi</a>
                <a class='button about' href='#about'>En savoir +</a>
            </div>
        </div>
    </section>
    <!-- Part HARD SKILLS -->
    <section id='hard-skills'>
        <div class='page-content'>
            <div class='text-tag'>
                <div class='tag-row'>
                    <p class='box'>Appli mobile</p>
                    <p class='box'>Site web</p>
                </div>
                <div class='tag-row'>
                    <p class='box'>Responsive</p>
                    <p class='box display-340'>Web & Web<br>Mobile</p>
                    <p class='box'>Full-Stack</p>
                </div>
                <div class='tag-row'>
                    <p class='box'>Web-Design</p>
                    <p class='box'>Référencement</p>
                </div>
            </div>
            <div class='logo-tag'>

                <?php
                $tagOpened = false;
                foreach ($hardSkille as $index => $imgName) {
                    if (!$tagOpened) {
                        echo '<div class="tag-row">';
                        $tagOpened = true;
                    }
                    echo '<img class="svg svg-dark" src="img/' . $imgName . '.svg" alt="Logo HTML5">';
                    if (is_int(($index + 1) / 4)) {
                        echo '</div>';
                        $tagOpened = false;
                    }
                }
                ?>
                </div>
                <p class="alt">Et plus encore...</p>
            </div>
            <!-- Link to the next section -->
            <div class='to-next-section'>
                <a href='#'><img class="svg svg-light" src="img/caret-down-square-fill.svg" alt=""></a>
            </div>
        </div>
    </section>
    <!-- Part ABOUT ME -->
    <div id='about'>
        <h2>À propos de moi</h2>
        <div class='page-content'>
            <img class="photo" src='img/question-2736480_1920.jpg' alt='Photo de moi, Adrien Delcros'>
            <div class="block-text">
                <p>
                    Je m'appelle Adrien Delcros et je suis développeur web. J'ai commencé à coder en autodidacte pendant quelques années avant de rejoindre une formation de développeur web pour approfondir mes connaissances et valider mes acquis.
                </p>
                <p>
                    Étant perfectionniste, je mets beaucoup d'attention dans ce que je fait, tant sur l'aspect visuel de mes créations que l'aspect technique.
                </p>
                <p>
                    Je pense que pour que les choses soit vraiment belles, elles doivent être utiles et pratiques, avec une conception autant harmonieuse de l'extérieur que de l'intérieur.
                </p>
                <p>
                    C'est donc ce que je m'efforce de faire tant dans mon travail que dans la vie de tous les jours.
                </p>
            </div>
        </div>
        <!-- End -->
            <!-- Link to the next section -->
            <div class='to-next-section'>
                <a href='#'><img class="svg svg-dark" src="img/caret-down-square-fill.svg" alt=""></a>
            </div>
    </div>
    <!-- Part BOARD -->
    <div id='board'>
        <div class="page-content">
            <!-- Sub-part EXPERIENCE -->
            <div class='experience'>
                <h2>Expériences</h2>
                <div class='block'>
                    <div class='timeline-bar'></div>
                    <div class='content'>
                        <?php
                        foreach ($exp as $value) {
                            echo '<h3><div class="mark"><img class="svg-secondary" src="img/circle.svg" alt=""></div>' . $value[0] .'</h3>';
                            echo '<ul>';
                            foreach ($value[1] as $key => $subValue) {
                                if ($key === 0) {
                                    echo '<li class="alt">' . $subValue . '</li>';
                                }
                                else {
                                    echo '<li>' . $subValue . '</li>';
                                }
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Sub-part SOFT SKILLS -->
            <div class='soft-skills'>
                <h2>Savoir-Être</h2>
                <div class='content'>
                    <h3><div class='mark'><img class="svg-secondary" src="img/star.svg" alt=""></div>Indépendant</h3>
                    <ul>
                        <li class='alt'>Initialement autodidacte, je suis capable de me former et de réaliser des projets à taille humaine seul</li>
                    </ul>  
                    <h3><div class='mark'><img class="svg-secondary" src="img/star.svg" alt=""></div>Consciencieux</h3>
                    <ul>
                        <li class='alt'>J'aime accomplir mes objectifs comme il le faut jusque dans les détails</li>
                    </ul>  
                    <h3><div class='mark'><img class="svg-secondary" src="img/star.svg" alt=""></div>Observateur</h3>
                    <ul>
                        <li class='alt'>J'arrive facilement à remettre les problèmes dans leur contexte, et en découvrir leur origine</li>
                    </ul>  
                </div>
            </div>
            <!-- Sub-part DIPLOME -->
            <div class='diplome'>
                <h2>Diplômes</h2>
                <div class='content'>
                    <h3><div class='mark'><img class="svg-secondary" src="img/school_black_24dp.svg" alt=""></div>Titre Pro - Développeur web & web mobile (bac+2)</h3>  
                </div>
            </div>
        </div>
        <!-- Link to the next section -->
        <div class='to-next-section'>
            <a href='#'><img class="svg svg-white" src="img/caret-down-square-fill.svg" alt=""></a>
        </div>
    </div>
    <!-- Part CONTACT -->
    <div id='contact'>
        <div class="page-content">
            <div class='top-section'>
                <div class="box-info">
                    <h2>Info</h2>
                    <div class="grp">
                        <div class='box'>
                            <img class="svg svg-white" src="img/id-card.svg" alt="">
                            <p>Adrien Delcros</p>
                        </div>

                        <div class='box'>
                            <img class="svg svg-white" src="img/briefcase.svg" alt="">
                            <p>Développeur Web</p>
                        </div>

                        <div class='box'>
                            <img class="svg svg-white" src="img/phone-call.svg" alt="">
                            <p><a href='tel:+33659775380'>06 59 77 53 80</a></p>
                        </div>

                        <div class='box'>
                            <img class="svg svg-white" src="img/at.svg" alt="">
                            <p><a href='mailto:ad.delcros@gmail.com'>ad.delcros@gmail.com</a></p>
                        </div>   
                    
                        <div class='box'>
                            <a href="#"><img class="svg svg-white" src="img/facebook-square.svg" alt=""></a>
                            <a href="#"><img class="svg svg-white" src="img/linkedin-square.svg" alt=""></a>
                            <a href="#"><img class="svg svg-white" src="img/twitter-square.svg" alt=""></a>
                        </div>                     
                    </div>
                    
                    <a  class='link-cv' href='#'><img class="svg svg-dark" src="img/file.svg" alt="">Télécharger mon C.V.</a>
                </div>
                <div class='box-form'>
                    <h2>Formulaire</h2>
                    <form id="form-contact">
                        <div class="box">
                            <label for="lname">Nom</label>
                            <input type="text" id="lname" name="lname" placeholder="Votre nom &gt;&gt;&gt;">
                            <p class="inputValueError" style="display:block"></p>
                        </div>
                        <div class="box">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="Votre email &gt;&gt;&gt;">
                            <p class="inputValueError" style="display:none"></p>
                        </div>
                        <div class="box">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" placeholder="Votre message &gt;&gt;&gt;"></textarea>
                            <p class="inputValueError" style="display:none"></p>
                        </div>
                        <div class="box">
                            <input type="submit" value="Envoyer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Part FOOTER -->
    <footer>
        <p>&copy;2022 Adrien Delcros - All rights reserved.</p>
    </footer>
</body>
</html>