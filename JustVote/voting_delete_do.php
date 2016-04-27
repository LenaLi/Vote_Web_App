<?php
include("inc/session_check.php");
require_once("Mapper/voting.php");
require_once("Mapper/voting_manager.php");

$votingid = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

$voting_manager = new voting_manager();
$voting_manager->delete($votingid);

// Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
header('Location: uebersicht.php');
?>

