<?php

session_start();
// Überprüfung, ob der Benutzer bereits eingeloggt ist
if($_SESSION["login"]<>"1"){
    // falls der Benutzer noch nicht eingeloggt ist, Weiterleitung auf index.php
    header('Location: index.php');
    die(); 
}
?>