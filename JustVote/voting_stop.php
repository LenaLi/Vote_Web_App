<?php include("inc/session_check.php");
require_once ("Mapper/voting.php");
require_once ("Mapper/voting_manager.php");

// Vorting-ID aus GET Parameter auslesen
$votingId=(int)htmlspecialchars ($_GET["id"], ENT_QUOTES, "UTF-8");

$voting_manager=new voting_manager();

// lese Voting mit Voting-ID aus Datenbank und speichere Informationen in einem Voting-Objekt
$voting=$voting_manager->findByVotingId($votingId);

// Zeitstempel erzeugen und für Datenbank formatieren
$endDatum=date("y-m-d H:i:s",time());

// Änderungen in Datenbank aktualisieren
$voting_manager->update($voting->votingid,$voting->vorlesungsid, $voting->votingname, $voting->frage, $voting->antwort_1, $voting->antwort_2 ,$voting->antwort_3, $voting->antwort_4, $voting->startdatum, $endDatum);

// Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
header('Location: uebersicht.php');
?>