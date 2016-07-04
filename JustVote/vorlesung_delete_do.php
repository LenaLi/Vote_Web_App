<?php
include("inc/session_check.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/voting_student.php");
require_once("Mapper/voting_student_manager.php");
require_once("Mapper/voting.php");
require_once("Mapper/voting_manager.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");


// Vorlesung-ID aus GET Parameter auslesen
$vorlesungsId = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

// Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
$voting_manager = new voting_manager();

//Lese Votings mit der Vorlesungsid aus voting_manager aus
$votings = $voting_manager->findByVorlesungsId($vorlesungsId);

// Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
$vorlesung_manager = new vorlesung_manager();

//Lese Vorlesung mit der Vorlesungsid aus vorlesung_manager aus
$vorlesung = $vorlesung_manager->findByVorlesungsId($vorlesungsId);

// Wenn Vorlesung nicht zu Benutzer gehört, dann wird der Zugriff verweigert
if ($vorlesung->benutzerid != $_SESSION["benutzerid"]) {
    die();
}

// Objekt von voting_student_manager erzeugen, welcher Datenbankverbindung besitzt
$voting_student_manager = new voting_student_manager();

foreach ($votings as $voting) {
    // Voting löschen in der Datenbank
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