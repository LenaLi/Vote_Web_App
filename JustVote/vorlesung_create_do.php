<?php
include("inc/session_check.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");

//POST Parameter auslesen
$vorlesungsid=$_POST["vorlesungsid"];
$benutzerid=$_SESSION["benutzerid"];
$vorlesungsname=$_POST["vorlesungsname"];

// Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
$manager=new vorlesung_manager();

// neue Vorlesung erzeugen mit den POST Parametern
$manager->create($vorlesungsid,$benutzerid,$vorlesungsname);

// Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
header('Location: uebersicht.php');
?>