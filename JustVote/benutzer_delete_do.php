<?php
include("inc/session_check.php");
require_once("Mapper/benutzer.php");
require_once("Mapper/benutzer_manager.php");

// Benutzer-ID aus GET Parameter auslesen
$id = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

// Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
$benutzer_manager = new benutzer_manager();

// lese Benutzer mit Benutzer-ID aus Datenbank aus
$benutzer = $benutzer_manager->findById($id);

// Objekt Benutzer löschen in der Datenbank löschen
$benutzer_manager->delete($benutzer);

// Weiterleitung auf die Übersichtsseite der Benutzer
header('Location: benutzer_read.php');
?>