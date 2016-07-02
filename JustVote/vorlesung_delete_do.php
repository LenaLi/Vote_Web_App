<?php
include("inc/session_check.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/voting_student.php");
require_once("Mapper/voting_student_manager.php");
require_once("Mapper/voting.php");
require_once("Mapper/voting_manager.php");


// Vorlesung-ID aus GET Parameter auslesen
$vorlesungsId = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

$voting_manager =new voting_manager();

$votings=$voting_manager->findByVorlesungsId($vorlesungsId);

$voting_student_manager= new voting_student_manager();

foreach($votings as $voting){
    $voting_student_manager->delete($voting->votingid);
    $voting_manager->delete($voting->votingid);
}

// Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
$vorlesung_manager = new vorlesung_manager();

// Vorlesung löschen in der Datenbank
$vorlesung_manager->delete($vorlesungsId);

// Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
header('Location: uebersicht.php');
?>