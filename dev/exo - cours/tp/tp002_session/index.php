<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'controllers/controller.php';

if (isset($_GET['action'])) {
    $action = htmlspecialchars($_GET['action']);
}
else {
    $action = '';
}

switch($action) {
    case 'logout':
        logout();
        break;
    case 'form_analysis':
        if (loginAttempt()) {
            header('Location: index.php?action=nav');
            die();
        }
        else {
            getLogin();
        }
        break;
    case 'nav':
        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
        }
        else {
            $id = '';
        }
        switch ($id) {
            case 'articles':
                articles();
                break;            
            case 'movies':
                movies();
                break;
            case 'mangas':
                mangas();
                break;            
            case 'cartoons':
                cartoons();
                break;
            case 'toys':
                toys();
                break;
            default:
                getNav();                
        } 
        break;
    case 'login':
    default:
        getLogin();
}