<?php
require_once("data_form.php");

$subject = $_SESSION['form']['first-name']['value'];



if (isset($_POST['user-first-name'])) {
    $_SESSION['form']['first-name']['value'] = htmlspecialchars($_POST['user-first-name']);
}
if (isset($_POST['user-last-name'])) {
    $_SESSION['form']['last-name']['value'] = htmlspecialchars($_POST['user-last-name']);
}

foreach ($_SESSION['form'] as $entry) {
    echo $entry['value'] . '<br>';
    foreach ($entry['eval-patern'] as $i => $patern) {
        echo '- ' . $i . ' = ' . $patern . '<br>';
        if (preg_match($patern, $entry['value'])) {
            echo '-- ' . 'TRUE' . '<br>';
        }
        else {
            echo '-- ' . 'FALSE' . '<br>';
        }

    }
}

session_destroy();