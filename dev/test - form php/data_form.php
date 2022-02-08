<?php
session_start();

if (! isset($_SESSION['form'])) {
    $_SESSION['form']['first-name']['value'] = '';
    $_SESSION['form']['first-name']['placeholder'] = '';
    $_SESSION['form']['first-name']['message'] = null;
    
    $_SESSION['form']['first-name']['eval-patern'][] = '/.+/';
    $_SESSION['form']['first-name']['eval-error'][] = 'Le prénom est requis';
    $_SESSION['form']['first-name']['eval-patern'][] = '/\A[[:alpha:]]+(?:[- ][[:alpha:]]+){0,4}[[:alpha:]]?\Z/u';
    $_SESSION['form']['first-name']['eval-error'][] = 'Le prénom contient des caractères invalide';
    $_SESSION['form']['first-name']['eval-patern'][] = '/\A.{2,30}\Z/';
    $_SESSION['form']['first-name']['eval-error'][] = 'Le prénom doit contenir entre 2 et 30 caractères';
    
    $_SESSION['form']['last-name']['value'] = '';
    $_SESSION['form']['last-name']['placeholder'] = '';
    $_SESSION['form']['last-name']['message'] = null;
    
    $_SESSION['form']['last-name']['eval-patern'][] = '/.+/u';
    $_SESSION['form']['last-name']['eval-error'][] = 'Le nom est requis';
    $_SESSION['form']['last-name']['eval-patern'][] = '/\A[[:alpha:]]+(?:[- ][[:alpha:]]+){0,4}[[:alpha:]]?\Z/u';
    $_SESSION['form']['last-name']['eval-error'][] = 'Le nom contient des caractères invalide';
    $_SESSION['form']['last-name']['eval-patern'][] = '/\A.{2,30}\Z/u';
    $_SESSION['form']['last-name']['eval-error'][] = 'Le nom doit contenir entre 2 et 30 caractères';
}