<?php

session_start();
// Überprüfung, ob der Student bereits eingeloggt ist
if($_SESSION["login"]<>"1"){
    // falls der Student noch nicht eingeloggt ist -> Weiterleitung auf Startseite
    header('Location: index.php');
    die();
}
?>