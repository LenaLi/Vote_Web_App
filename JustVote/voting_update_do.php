<?php

require_once("Mapper/voting_manager.php");
require_once("Mapper/voting.php");

$votingid = (int)$_POST["votingid"];
$vorlesungsid = htmlspecialchars($_POST["vorlesungsid"], ENT_QUOTES, "UTF-8");


if (!empty($votingid) && !empty($vorlesungsid)) {
    $voting_manager = new voting_manager();
    $voting_manager->update($votingid, $vorlesungsid);
    header('Location: uebersicht.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}

