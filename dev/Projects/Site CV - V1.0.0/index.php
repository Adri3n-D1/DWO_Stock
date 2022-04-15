<?php
try {

    $serverName = 'localhost';
    $dbname = 'site_cv';
    $port = '3006';
    $charset = 'utf8';

    $username = 'root';
    $password = '';

    $db = new PDO(
        'mysql:host='.$serverName.';dbname='.$dbname.';charset='.$charset,
        $username, $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // get the hardskills from database
    $sql = 'SELECT body FROM hardskills';
    $request = $db->prepare($sql);
    $request->execute();
    
    $hardSkills = [];
    foreach ($request->fetchAll() as $hardSkill) {
        $hardSkills[] = $hardSkill['body'];
    }
    // get the softskills from database
    $sql = 'SELECT title, body FROM softskills';
    $request = $db->prepare($sql);
    $request->execute();
    
    $softSkills = [];
    foreach ($request->fetchAll() as $softSkill) {
        $softSkills[] = [
            $softSkill['title'],
            $softSkill['body'],
        ];
    }
    // get the experience from database
    $sql = 'SELECT title, period, body FROM experiences';
    $request = $db->prepare($sql);
    $request->execute();
    
    $experiences = [];
    foreach ($request->fetchAll() as $xp) {
        $experiences[$xp['title']][$xp['period']][] = $xp['body'];
    }
    // get the diplomes from database
    $sql = 'SELECT body FROM diplomes';
    $request = $db->prepare($sql);
    $request->execute();
    
    $diplomes = [];
    foreach ($request->fetchAll() as $diplome) {
        $diplomes[] = $diplome['body'];
    }
}
catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
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

    <script type="text/javascript" src="nav_menu.js" defer></script>
    <script type="text/javascript" src="form_validation.js" defer></script>

    <title>Adrien Delcros - Site C.V.</title>
</head>
<body>
    <!-- Part HEADER -->
    <header>
        <nav>
            <div id="grp-btn-menu">
                <a id="btn-menu" class="link-menu" href="javascript:void(0);" onclick="toggleMenu()"><img id="icon-menu" class="svg svg-light" src='img/open-menu.svg' alt=''><span id="btn-text-menu"><span></a>
            </div>
            <div id='menu-nav'>
                <a href="#"><img class="svg svg-white" src="img/home.svg" alt="Lien vers l'accueil"></a>
                <a href="#goto-hard-skills">Mes Compétences</a>
                <a href="#goto-about">Moi</a>
                <a href="#goto-experience">Mon Experience</a>
                <a href="#goto-contact">Me Contacter</a>
            </div>
        </nav>            
    </header>
    <!-- Part INTRO -->
    <section class='introduction-section'>
        <div class="page-content">
            <p class='name'>ADRIEN DELCROS</p>
            <p class='slogan'>Créateur du<br>web</p>
            <div class='row-button'>
                <a class='button contact' href='#goto-contact'>Contactez-moi</a>
                <a class='button about' href='#goto-about'>En savoir +</a>
            </div>
        </div>
    </section>
    <!-- Part HARD SKILLS -->
    <div id="goto-hard-skills" class="goto"></div>
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
                foreach ($hardSkills as $index => $imgName) {
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
                <a href='#goto-about'><img class="svg svg-light" src="img/caret-down-square-fill.svg" alt=""></a>
            </div>
        </div>
    </section>
    <!-- Part ABOUT ME -->
    <div id="goto-about" class="goto"></div>
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
                <a href='#goto-experience'><img class="svg svg-dark" src="img/caret-down-square-fill.svg" alt=""></a>
            </div>
    </div>
    <!-- Part BOARD -->
    <div id='board'>
        <div class="page-content">
            <!-- Sub-part EXPERIENCE -->
            <div id="goto-experience" class="goto"></div>
            <div id='experience'>
                <h2>Expériences</h2>
                <div class='block'>
                    <div class='timeline-bar'></div>
                    <div class='content'>
                        <?php
                        foreach ($experiences as $title => $experiencesByPeriod) {
                            echo '<h3><div class="mark"><img class="svg-secondary" src="img/circle.svg" alt=""></div>' . $title .'</h3>';
                            echo '<ul>';
                            $i = 0;
                            foreach ($experiencesByPeriod as $period => $experiences) {
                                echo '<li class="alt">' . $period . '</li>';
                                foreach ($experiences as $experience) {
                                    echo '<li>' . $experience . '</li>';
                                }
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Sub-part SOFT SKILLS -->
            <div id="goto-soft-skills" class="goto"></div>
            <div class='soft-skills'>
                <h2>Savoir-Être</h2>
                <div class='content'>
                    <?php foreach($softSkills as $softSkill): ?>
                        <h3><div class='mark'><img class="svg-secondary" src="img/star.svg" alt=""></div><?= $softSkill[0] ?></h3>
                        <ul>
                            <li class='alt'><?= $softSkill[1] ?></li>
                        </ul>  
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Sub-part DIPLOME -->
            <div class='diplome'>
                <h2>Diplômes</h2>
                <div class='content'>
                    <?php foreach($diplomes as $diplome) : ?>
                        <h3><div class='mark'><img class="svg-secondary" src="img/school_black_24dp.svg" alt=""></div><?= $diplome ?></h3>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Link to the next section -->
        <div class='to-next-section'>
            <a href='#goto-contact'><img class="svg svg-white" src="img/caret-down-square-fill.svg" alt=""></a>
        </div>
    </div>
    <!-- Part CONTACT -->
    <div id="goto-contact" class="goto"></div>
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
                    
                    <a  class='link-cv' href='cv_adrien_delcros_dev_web.pdf' download><img class="svg svg-dark" src="img/file.svg" alt="">Télécharger mon C.V.</a>
                </div>
                <div class='box-form'>
                    <h2>Formulaire</h2>
                    <form id="form-contact">
                        <div class="box">
                            <label for="lname">Nom</label>
                            <input type="text" id="lname" name="lname" placeholder="Votre nom &gt;&gt;&gt;">
                            <p class="inputValueError" style="display:none"></p>
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