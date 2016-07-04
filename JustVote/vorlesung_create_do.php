<?php
include("inc/session_check.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");

//POST Parameter auslesen
$benutzerId = $_SESSION["benutzerid"];
$vorlesungsName = $_POST["vorlesungsname"];
$vorlesungsNummer = $_POST["vorlesungsnummer"];

// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($vorlesungsName) && !empty($vorlesungsNummer)) {

    // Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
    $manager = new vorlesung_manager();

    // neue Vorlesung erzeugen mit den POST Parametern
    $manager->create($benutzerId, $vorlesungsName, $vorlesungsNummer);

    // Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
    header('Location: uebersicht.php');

} else {
    header('Location: vorlesung_create_form.php?error=1');
}
?>