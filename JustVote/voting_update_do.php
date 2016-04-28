<?php
require_once("Mapper/voting_manager.php");
require_once("Mapper/voting.php");

// POST Parameter auslesen
$votingId = (int)htmlspecialchars($_POST["votingid"], ENT_QUOTES, "UTF-8");
$vorlesungsId=(int)htmlspecialchars($_POST["vorlesungsid"], ENT_QUOTES, "UTF-8");
$votingName=htmlspecialchars($_POST["votingname"], ENT_QUOTES, "UTF-8");
$frage=htmlspecialchars($_POST["frage"], ENT_QUOTES, "UTF-8");
$antwort_1=htmlspecialchars($_POST["antwort_1"], ENT_QUOTES, "UTF-8");
$antwort_2=htmlspecialchars($_POST["antwort_2"], ENT_QUOTES, "UTF-8");
$antwort_3=htmlspecialchars($_POST["antwort_3"], ENT_QUOTES, "UTF-8");
$antwort_4=htmlspecialchars($_POST["antwort_4"], ENT_QUOTES, "UTF-8");
$startDatum=htmlspecialchars($_POST["startdatum"], ENT_QUOTES, "UTF-8");
$endDatum=htmlspecialchars($_POST["enddatum"], ENT_QUOTES, "UTF-8");

// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($votingId) && !empty($votingName)&& !empty($frage)&& !empty($antwort_1) && !empty($antwort_2)&& !empty($startDatum)&& !empty($endDatum)) {

    // Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
    $voting_manager = new voting_manager();

    // Änderungen in Datenbank aktualisieren
    $voting_manager->update($votingId, $vorlesungsId, $votingName, $frage, $antwort_1, $antwort_2, $antwort_3, $antwort_4, $startDatum, $endDatum );

    // Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
    header('Location: uebersicht.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>

