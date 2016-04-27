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



//Weiterleitung auf uebersicht.php oder Fehlermeldung (keine Dopplungen, keine Berechtigungen)
header('Location: uebersicht.php');
?>