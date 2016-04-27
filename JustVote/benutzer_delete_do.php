<?php
include("inc/session_check.php");
require_once("Mapper/benutzer.php");
require_once("Mapper/benutzer_manager.php");

$id = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

//Datenbankverbindung aufbauen
$benutzer_manager = new benutzer_manager();
$benutzer = $benutzer_manager->findById($id);

// das Objekt Benutzer löschen
$benutzer_manager->delete($benutzer);

//Weiterleitung auf die Seite benutzer_read.php
header('Location: benutzer_read.php');
?>