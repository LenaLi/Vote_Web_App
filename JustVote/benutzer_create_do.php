<?php 
include("inc/session_check.php");
require_once("Mapper/benutzer.php");
require_once("Mapper/benutzer_manager.php");

//POST Parameter auslesen
$vorname=$_POST["vorname"];
$nachname=$_POST["nachname"];
$email=$_POST["email"];
$role=$_POST["role"];

// Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
$manager=new benutzer_manager();

// neuen Benutzer erzeugen mit den POST Parametern
$manager->create($vorname,$nachname,$email,$role);

// Weiterleitung auf die Übersichtsseite der Benutzer
header('Location: benutzer_read.php');
?>