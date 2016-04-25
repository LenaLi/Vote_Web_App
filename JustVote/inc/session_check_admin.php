<?php
// Überprüfung, ob der Benutzer die Rolle Admin besitzt - falls nein, dann Weiterleitung auf index.php
if($_SESSION["role"]<>"admin"){
    header('Location: index.php');
    die();
}
?>