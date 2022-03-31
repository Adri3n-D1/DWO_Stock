<?php
require_once 'models/model.php';

function logout() {
    /* log out and redirect to login screen */
    if (isset($_SESSION['isMajor'])) {
        unset($_SESSION['isMajor']);
    }
    setcookie('isMajor');
    unset($_COOKIE['isMajor']);

    header('Location: index.php');
}

function loginAttempt() {
    /* Connect and return true if the information received is valid, otherwise report the error via the session variable 'errorInput' and return false */
    if (!isset($_POST['form-email']) || empty($_POST['form-email'])) {
        $_SESSION['errorInput'] = 'email';
        return false;
    }

    if (!isset($_POST['form-password']) || empty($_POST['form-password'])) {
        $_SESSION['errorInput'] = 'mot de passe';
        return false;
    }

    if (!isset($_POST['form-age']) || empty($_POST['form-age'])) {
        $_SESSION['errorInput'] = 'age';
        return false;
    }

    if (isset($_POST['form-remember'])) {
        $isMajor = strip_tags($_POST['form-age']) >= 18;
        setcookie('isMajor', $isMajor, time() + 3600 * 24);
    }
    else {
        setcookie('isMajor');
        unset($_COOKIE['isMajor']);
    }

    $age = strip_tags($_POST['form-age']);
    $_SESSION['isMajor'] = $age >= 18;

    return true;
}

function getLogin() {
    /* Retrieves login information if stored, otherwise displays the login page */
    if (getSavedSession()) {
        require_once 'views/nav.php';
    }
    else {
        require_once 'views/login.php';
    }
}

function getNav() {
    if (!isset($_SESSION['isMajor'])) {
        $_SESSION['errorAccess'] = 'inscrits';
        logout();
    }
    else {
        require_once 'views/nav.php';
    }
}

function articles() {
    if (!isset($_SESSION['isMajor'])) {
        $_SESSION['errorAccess'] = 'inscrits';
        logout();
    }
    elseif (isset($_SESSION['isMajor']) && $_SESSION['isMajor']) {
        require_once 'views/nav/articles.php';
    }
    else {
        $_SESSION['errorAccess'] = 'adultes';
        logout();
    }
}

function movies() {   
    if (!isset($_SESSION['isMajor'])) {
        $_SESSION['errorAccess'] = 'inscrits';
        logout();
    }
    else { 
        require_once 'views/nav/movies.php';
    }
}

function mangas() {
    if (!isset($_SESSION['isMajor'])) {
        $_SESSION['errorAccess'] = 'inscrits';
        logout();
    }
    else {    
        require_once 'views/nav/mangas.php';
    }
}

function cartoons() { 
    if (!isset($_SESSION['isMajor'])) {
        $_SESSION['errorAccess'] = 'inscrits';
        logout();
    }
    elseif (isset($_SESSION['isMajor']) && !$_SESSION['isMajor']) {
        require_once 'views/nav/cartoons.php';
    }
    else {
        $_SESSION['errorAccess'] = 'enfants';
        logout();
    }   
}

function toys() {
    if (!isset($_SESSION['isMajor'])) {
        $_SESSION['errorAccess'] = 'inscrits';
        logout();
    }
    elseif (isset($_SESSION['isMajor']) && !$_SESSION['isMajor']) {
        require_once 'views/nav/toys.php';
    }
    else {
        $_SESSION['errorAccess'] = 'enfants';
        logout();
    }      
}