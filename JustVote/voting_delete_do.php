<?php
include("inc/session_check.php");
require_once("Mapper/voting.php");
require_once("Mapper/voting_manager.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/frage.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort.php");
require_once("Mapper/antwort_manager.php");
require_once("Mapper/voting_student.php");
require_once("Mapper/voting_student_manager.php");

// Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
$voting_manager = new voting_manager();

// Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
$vorlesung_manager = new vorlesung_manager();

// Vorting-ID aus GET Parameter auslesen
$votingId = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

//Lese Votings mit der Votingid aus voting_manager aus
$voting = $voting_manager->findByVotingId($votingId);

//Lese Vorlesungen mit der Vorlesungsid aus vorlesung_manager aus
$vorlesung = $vorlesung_manager->findByVorlesungsId($voting->vorlesungsid);

// Wenn Voting nicht zu Benutzer gehört, dann wird der Zugriff verweigert
if ($vorlesung->benutzerid != $_SESSION["benutzerid"]) {
    die();
}

// Objekt von voting_student_manager erzeugen, welcher Datenbankverbindung besitzt
$voting_student_manager = new voting_student_manager();

// Voting löschen in der Datenbank
$voting_student_manager->delete($votingId);

// Voting löschen in der Datenbank
$voting_manager->delete($votingId);

// Objekt von frage_manager erzeugen, welcher Datenbankverbindung besitzt
$manager = new frage_manager();

// Lese die Frage mit der votingid aus frage_manager
$frage = $manager->getFragebyVotingid($votingId);

//  löschen der Frage anhand der votingId im frage_manager (damit Daten der Frage zum Voting aus der Datenbank entfernt werden)
$manager->deleteByVotingId($votingId);

// Objekt von antwort_manager erzeugen, welcher Datenbankverbindung besitzt
$manager = new antwort_manager();

//  löschen der Antworten anhand der Id im frage_manager (damit Daten der Antworten zum Voting aus der Datenbank entfernt werden)
$manager->deleteByFrageId($frage->ID);


// Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
header('Location: uebersicht.php?vorlesungsid='.$vorlesung->vorlesungsid);
?>

