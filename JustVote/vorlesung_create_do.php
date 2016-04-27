<?php
include("inc/session_check.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");

//POST Parameter auslesen
$vorlesungsId=$_POST["vorlesungsid"];
$benutzerId=$_SESSION["benutzerid"];
$vorlesungsName=$_POST["vorlesungsname"];

// Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
$manager=new vorlesung_manager();

// neue Vorlesung erzeugen mit den POST Parametern
$manager->create($vorlesungsId,$benutzerId,$vorlesungsName);

// Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
header('Location: uebersicht.php');
?>