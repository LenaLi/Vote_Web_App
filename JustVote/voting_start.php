<?php
include("inc/session_check.php");
require_once ("Mapper/voting.php");
require_once ("Mapper/voting_manager.php");

// Vorting-ID aus GET Parameter auslesen
$votingId=(int)htmlspecialchars ($_GET["id"], ENT_QUOTES, "UTF-8");

// Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
$voting_manager=new voting_manager();

$voting=$voting_manager->findByVotingId($votingId);

$voting_manager->update($voting->votingid,$voting->vorlesungsid, $voting->votingname, $voting->frage, $voting->antwort_1, $voting->antwort_2 ,$voting->antwort_3, $voting->antwort_4, date("y-m-d H:i:s",time()), $voting->enddatum);

// Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
header('Location: uebersicht.php');
?>