<?php

session_start();
if (isset($_SESSION['utilisateur_co']) && !empty($_SESSION['utilisateur_co'])) {
    $nom = validdonnees($_POST['form-nom']);
    $mail = validdonnees($_POST['form-email']);
    $annee = validdonnees($_POST['form-naissance']);
    $pass = validdonnees($_POST['form-password']);
    $role = validdonnees($_POST['form-role']);

    
    if (!empty($nom) &&
        strlen($nom) < 40 &&
        preg_match("^[A-Za-z '-]+$",$nom) &&
        !empty($mail) &&
        filter_var($mail, FILTER_VALIDATE_EMAIL) && !empty($annee) && $annee >= 1950 && $annee <= 2006 &&
        !empty($pass) &&
        preg_match("^[A-Za-z0-9!@#$%&*\-_=+;:,.?]{12,}$",$pass) &&
        !empty($role)) {
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
        header('Location: exo315_compte.php');
    }
}
else {
    header('Location: exo315_index.php');
}

function validdonnees($donnees) {
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}