<?php
include("inc/session_check.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");

// Vorlesung-ID aus GET Parameter auslesen
$vorlesungsid = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

// Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
$vorlesung_manager = new vorlesung_manager();

// Vorlesung löschen in der Datenbank
$vorlesung_manager->delete($vorlesungsid);

// Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
header('Location: uebersicht.php');
?>