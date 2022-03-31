<?php

function getSavedSession() {
    /* return true and configure session if remembered, return false otherwise */    
    if (isset($_COOKIE['isMajor'])) {
        $_SESSION['isMajor'] = htmlspecialchars($_COOKIE['isMajor']);
        setcookie('isMajor', $_SESSION['isMajor'], time() + 3600 * 24);
        return true;
    }
    return false;
}