<?php
include("inc/session_check.php");
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

$voting_manager =new voting_manager();

$vorlesung_manager = new vorlesung_manager();

$vorlesungen=$vorlesung_manager->findByBenutzerID($id);

foreach ($vorlesungen as $vorlesung){


    $votings=$voting_manager->findByVorlesungsId($vorlesung->vorlesungsid);

    $voting_student_manager= new voting_student_manager();

    foreach($votings as $voting){
        $voting_student_manager->delete($voting->votingid);
        $voting_manager->delete($voting->votingid);
    }
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