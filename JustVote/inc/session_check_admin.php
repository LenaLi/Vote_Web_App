<?php
// Überprüfung, ob der Benutzer die Rolle Admin besitzt - falls nein, dann Weiterleitung auf Startseite
if($_SESSION["role"]<>"admin"){
    header('Location: index.php');
    die();
}
?>