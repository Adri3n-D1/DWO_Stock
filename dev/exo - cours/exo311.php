<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'blog';

try {
    $codb = new PDO(
        'mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8',
        $username, $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo 'Connexion réussie<br>';

    $sql = $codb->prepare(
        'CREATE TABLE Articles (
        Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Titre VARCHAR(60) NOT NULL,
        Contenus TEXT NOT NULL,
        Id_redacteur INT NOT NULL,
        Article_associe INT
        )'
    );
    $sql->execute();
    echo 'Table Articles bien créée !<br>';

    $sql = $codb->prepare(
        'INSERT INTO Articles(titre, contenus, id_redacteur, article_associe)
         VALUES (:titre, :contenus, :redacteur, :associe)'
    );

    $parametres = [
        ':titre' => 'Article 1',
        ':contenus' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare enim lectus, vestibulum ultrices risus venenatis non. Maecenas nec leo sit amet justo fermentum cursus. Praesent sit amet pretium dui. Proin arcu quam, dignissim eget commodo eu, facilisis vel lorem. Nunc et maximus arcu. Duis risus orci, sollicitudin sollicitudin magna eu, dapibus cursus ipsum. Sed et venenatis erat, vel viverra ipsum. Pellentesque non lorem justo.', ':redacteur' => 5,
        ':associe' => null
    ];
    $sql->execute($parametres);
 
    $parametres = [
        ':titre' => 'Article 2',
        ':contenus' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare enim lectus, vestibulum ultrices risus venenatis non. Maecenas nec leo sit amet justo fermentum cursus. Praesent sit amet pretium dui. Proin arcu quam, dignissim eget commodo eu, facilisis vel lorem. Nunc et maximus arcu. Duis risus orci, sollicitudin sollicitudin magna eu, dapibus cursus ipsum. Sed et venenatis erat, vel viverra ipsum. Pellentesque non lorem justo.',
        ':redacteur' => 5,
        ':associe' => 1
    ];
    $sql->execute($parametres);

    $parametres = [
        ':titre' => 'Article 3',
        ':contenus' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare enim lectus, vestibulum ultrices risus venenatis non. Maecenas nec leo sit amet justo fermentum cursus. Praesent sit amet pretium dui. Proin arcu quam, dignissim eget commodo eu, facilisis vel lorem. Nunc et maximus arcu. Duis risus orci, sollicitudin sollicitudin magna eu, dapibus cursus ipsum. Sed et venenatis erat, vel viverra ipsum. Pellentesque non lorem justo.',
        ':redacteur' => 4,
        ':associe' => 1
    ];
    $sql->execute($parametres);

}
catch(PDOException $e) {
    echo "Message d'erreur : " . $e->getMessage() . "<br>";
}