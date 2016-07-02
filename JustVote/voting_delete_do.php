<?php
include("inc/session_check.php");
require_once("Mapper/voting.php");
require_once("Mapper/voting_manager.php");
require_once("Mapper/frage.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort.php");
require_once("Mapper/antwort_manager.php");
require_once("Mapper/voting_student.php");
require_once("Mapper/voting_student_manager.php");

// Vorting-ID aus GET Parameter auslesen
$votingId = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

// Objekt von voting_student_manager erzeugen, welcher Datenbankverbindung besitzt
$voting_student_manager = new voting_student_manager();

// Voting löschen in der Datenbank
$voting_student_manager->delete($votingId);


// Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
$voting_manager = new voting_manager();

// Voting löschen in der Datenbank
$voting_manager->delete($votingId);


// Objekt von frage_manager erzeugen, welcher Datenbankverbindung besitzt
$manager=new frage_manager();

$frage=$manager->getFragebyVotingid($votingId);

$manager->deleteByVotingId($votingId);

// Objekt von antwort_manager erzeugen, welcher Datenbankverbindung besitzt
$manager=new antwort_manager();

$manager->deleteByFrageId($frage->ID);



// Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
header('Location: uebersicht.php');
?>

