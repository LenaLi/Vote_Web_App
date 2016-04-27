<?php
include("inc/session_check.php");
require_once("Mapper/benutzer.php");
require_once("Mapper/benutzer_manager.php");

//Id des Benutzers auslesen
$id = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

// Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
$benutzer_manager = new benutzer_manager();

// Funktion findById
$benutzer = $benutzer_manager->findById($id);

// Objekt Benutzer löschen in der Datenbank löschen
$benutzer_manager->delete($benutzer);

// Weiterleitung auf benutzer_read
header('Location: benutzer_read.php');
?>