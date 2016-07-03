<?php
include("inc/session_check.php");
include("inc/session_check_admin.php");
require_once("Mapper/benutzer.php");
require_once("Mapper/benutzer_manager.php");
require_once("Mapper/voting.php");
require_once("Mapper/voting_manager.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/voting_student.php");
require_once("Mapper/voting_student_manager.php");

// Benutzer-ID aus GET Parameter auslesen
$id = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

// Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
$voting_manager =new voting_manager();

// Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
$vorlesung_manager = new vorlesung_manager();

// lese Vorlesungen mit Benutzer-ID aus Datenbank aus
$vorlesungen=$vorlesung_manager->findByBenutzerID($id);

foreach ($vorlesungen as $vorlesung){
    
    $votings=$voting_manager->findByVorlesungsId($vorlesung->vorlesungsid);

    // Objekt von voting_student_manager erzeugen, welcher Datenbankverbindung besitzt
    $voting_student_manager= new voting_student_manager();

    foreach($votings as $voting){
        // Voting löschen in der Datenbank
        $voting_student_manager->delete($voting->votingid);
        $voting_manager->delete($voting->votingid);
    }
    // Vorlesung löschen in der Datenbank
    $vorlesung_manager->delete($vorlesung->vorlesungsid);
}


// Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
$benutzer_manager = new benutzer_manager();

// lese Benutzer mit Benutzer-ID aus Datenbank aus
$benutzer = $benutzer_manager->findById($id);

// Benutzer löschen in der Datenbank 
$benutzer_manager->delete($benutzer);

// Weiterleitung auf die Übersichtsseite der Benutzer
header('Location: benutzer_read.php');
?>