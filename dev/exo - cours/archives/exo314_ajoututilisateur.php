<?php

session_start();

if (isset($_SESSION['utilisateur_co']) && !empty($_SESSION['utilisateur_co'])) {
    $nom = htmlspecialchars($_POST['form-nom']);
    $mail = htmlspecialchars($_POST['form-email']);
    $annee = htmlspecialchars($_POST['form-naissance']);
    $pass = htmlspecialchars($_POST['form-password']);
    $role = htmlspecialchars($_POST['form-role']);

    try {
        $serverName = 'localhost';
        $dbname = 'blog';
        $username = 'root';
        $password = '';

        $db = new PDO(
            'mysql:host=' . $serverName . ';dbname=' . $dbname . ';charset=utf8',
            $username, $password
        );
        $sql = 'INSERT INTO utilisateurs (Nom, Mail, Password, AnneNaissance, Role)
                VALUES(:nom, :mail, :password, :annee, :role)';
        $request = $db->prepare($sql);
        
        $request->bindParam(':nom',$nom);
        $request->bindParam(':mail',$mail);
        $request->bindParam(':password',$pass);
        $request->bindParam(':annee',$annee);
        $request->bindParam(':role',$role);

        $request->execute();
        echo 'Nouveau utilisateur ajouté !<br>';
    }
    catch (PDOException $e) {
        echo 'ERREUR : ' . $e->getMessage();
    }
}
else {
    header('Location: exo314_index.php');
}
?>