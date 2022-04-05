<?php
require_once('exo283sessions.php');
if (isset($_SESSION['pages'])) {
    unset($_SESSION['pages']);
}
session_destroy();