<?php include("inc/session_check.php"); ?>

<?php
require_once("Mapper/voting.php");
require_once("Mapper/voting_manager.php");

$votingid = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

$voting_manager = new voting_manager();
$voting = $voting_manager->findByVotingId($votingid);
$voting_manager->delete($voting);

header('Location: uebersicht.php');
