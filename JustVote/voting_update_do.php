<?php
require_once("Mapper/voting_manager.php");
require_once("Mapper/voting.php");
require_once("Mapper/frage.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort.php");
require_once("Mapper/antwort_manager.php");


// POST Parameter auslesen
$votingId = (int)htmlspecialchars($_POST["votingid"], ENT_QUOTES, "UTF-8");
$vorlesungsId=(int)htmlspecialchars($_POST["vorlesungsid"], ENT_QUOTES, "UTF-8");
$votingName=htmlspecialchars($_POST["votingname"], ENT_QUOTES, "UTF-8");
$frageText=htmlspecialchars($_POST["frage"], ENT_QUOTES, "UTF-8");
$antwort_1=htmlspecialchars($_POST["antwort_1"], ENT_QUOTES, "UTF-8");
$antwort_2=htmlspecialchars($_POST["antwort_2"], ENT_QUOTES, "UTF-8");
$antwort_3=htmlspecialchars($_POST["antwort_3"], ENT_QUOTES, "UTF-8");
$antwort_4=htmlspecialchars($_POST["antwort_4"], ENT_QUOTES, "UTF-8");
$startDatum=htmlspecialchars($_POST["startdatum"], ENT_QUOTES, "UTF-8");
$endDatum=htmlspecialchars($_POST["enddatum"], ENT_QUOTES, "UTF-8");
$startZeit=htmlspecialchars($_POST["startzeit"], ENT_QUOTES, "UTF-8");
$endZeit=htmlspecialchars($_POST["endzeit"], ENT_QUOTES, "UTF-8");

// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($votingId) && !empty($votingName)&& !empty($frageText)&& !empty($antwort_1) && !empty($antwort_2)&& !empty($startDatum)&& !empty($endDatum)&& !empty($startZeit)&& !empty($endZeit)) {

    // Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
    $voting_manager = new voting_manager();

    $endDatum.=' '.$endZeit;
    $startDatum.=' '.$startZeit;

    // Änderungen in Datenbank aktualisieren
    $voting_manager->update($votingId, $vorlesungsId, $votingName, $startDatum, $endDatum);


    // Objekt von frage_manager erzeugen, welcher Datenbankverbindung besitzt
    $manager=new frage_manager();
    
    //
    $frage=$manager->getFragebyVotingid($votingId);
    
    // neue Frage in Datenbank updaten mit den POST Parametern
    $manager->update($frage->ID, $votingId, $frageText);

    // Objekt von antwort_manager erzeugen, welcher Datenbankverbindung besitzt
    $manager=new antwort_manager();

    $antworten=$manager->getAllByFrageID($frage->ID);
    $manager->update($antworten[0]->ID, $frage->ID, $antwort_1);
    $manager->update($antworten[1]->ID,$frage->ID, $antwort_2);
    $manager->update($antworten[2]->ID,$frage->ID, $antwort_3);
    $manager->update($antworten[3]->ID,$frage->ID, $antwort_4);

    // Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
    header('Location: uebersicht.php');
} else {
    header('Location: voting_update_form.php?error=1');
}
?>

