<?php
include("inc/session_check.php");
require_once("Mapper/voting.php");
require_once("Mapper/voting_manager.php");
require_once("Mapper/frage.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort.php");
require_once("Mapper/antwort_manager.php");

//POST Parameter auslesen
$vorlesungsId = htmlspecialchars($_POST["vorlesungsid"], ENT_QUOTES, "UTF-8");
$votingName = htmlspecialchars($_POST["votingname"], ENT_QUOTES, "UTF-8");;
$frage = htmlspecialchars($_POST["frage"], ENT_QUOTES, "UTF-8");;
$antwort_1 = htmlspecialchars($_POST["antwort_1"], ENT_QUOTES, "UTF-8");;
$antwort_2 = htmlspecialchars($_POST["antwort_2"], ENT_QUOTES, "UTF-8");;
$antwort_3 = htmlspecialchars($_POST["antwort_3"], ENT_QUOTES, "UTF-8");;
$antwort_4 = htmlspecialchars($_POST["antwort_4"], ENT_QUOTES, "UTF-8");;
$startDatum = htmlspecialchars($_POST["startdatum"], ENT_QUOTES, "UTF-8");
$endDatum = htmlspecialchars($_POST["enddatum"], ENT_QUOTES, "UTF-8");


// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($votingName) && !empty($frage) && !empty($antwort_1) && !empty($antwort_2) && !empty($startDatum) && !empty($endDatum)) {

    $startDatum = htmlspecialchars($_POST["startdatum"] . " " . $_POST["startzeit"], ENT_QUOTES, "UTF-8");
    $endDatum = htmlspecialchars($_POST["enddatum"] . " " . $_POST["endzeit"], ENT_QUOTES, "UTF-8");
    $startDatum = date("Y-m-d H:i:s", strtotime($startDatum));
    $endDatum = date("Y-m-d H:i:s", strtotime($endDatum));

    // Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
    $manager = new voting_manager();

    // neues Voting erzeugen mit den POST Parametern
    $voting_id = $manager->create($vorlesungsId, $votingName, $startDatum, $endDatum);

    // Objekt von frage_manager erzeugen, welcher Datenbankverbindung besitzt
    $manager = new frage_manager();

    // neue Frage in Datenbank erzeugen mit den POST Parametern
    $frageID = $manager->create($voting_id, $frage);

    // Objekt von antwort_manager erzeugen, welcher Datenbankverbindung besitzt
    $manager = new antwort_manager();

    // neue Antwort in Datenbank erzeugen mit den POST Parametern
    $manager->create($frageID, $antwort_1);
    $manager->create($frageID, $antwort_2);
    $manager->create($frageID, $antwort_3);
    $manager->create($frageID, $antwort_4);


    // Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
    header('Location: uebersicht.php');
} else {
    header('Location: voting_create_form.php?error=1');
}
?>

