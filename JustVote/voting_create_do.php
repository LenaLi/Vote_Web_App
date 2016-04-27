<?php
include("inc/session_check.php");
require_once("Mapper/voting.php");
require_once("Mapper/voting_manager.php");

//POST Parameter auslesen
$vorlesungsId=htmlspecialchars($_POST["vorlesungsid"], ENT_QUOTES, "UTF-8");
$votingName=htmlspecialchars($_POST["votingname"], ENT_QUOTES, "UTF-8");;
$frage=htmlspecialchars($_POST["frage"], ENT_QUOTES, "UTF-8");;
$antwort_1=htmlspecialchars($_POST["antwort_1"], ENT_QUOTES, "UTF-8");;
$antwort_2=htmlspecialchars($_POST["antwort_2"], ENT_QUOTES, "UTF-8");;
$antwort_3=htmlspecialchars($_POST["antwort_3"], ENT_QUOTES, "UTF-8");;
$antwort_4=htmlspecialchars($_POST["antwort_4"], ENT_QUOTES, "UTF-8");;
$startDatum=htmlspecialchars($_POST["startdatum"]." ". $_POST["startzeit"], ENT_QUOTES, "UTF-8");;
$endDatum=htmlspecialchars($_POST["enddatum"]." ". $_POST["endzeit"], ENT_QUOTES, "UTF-8");;

// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($votingName)&& !empty($frage)&& !empty($antwort_1) && !empty($antwort_2)&& !empty($startDatum)&& !empty($endDatum)) {

// Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
$manager=new voting_manager();

// neues Voting erzeugen mit den POST Parametern
$manager->create($vorlesungsId, $votingName, $frage, $antwort_1,$antwort_2,$antwort_3,$antwort_4,$startDatum,$endDatum);

// Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
header('Location: uebersicht.php');
}
else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>

