<?php
require_once("Mapper/voting_manager.php");
require_once("Mapper/voting.php");

$votingid = (int)$_POST["votingid"];
$vorlesungsid=(int)$_POST["vorlesungsid"];
$votingname=$_POST["votingname"];
$frage=$_POST["frage"];
$antwort_1=$_POST["antwort_1"];
$antwort_2=$_POST["antwort_2"];
$antwort_3=$_POST["antwort_3"];
$antwort_4=$_POST["antwort_4"];
$startdatum=$_POST["startdatum"];
$enddatum=$_POST["enddatum"];


$vorlesungsid = htmlspecialchars($_POST["vorlesungsid"], ENT_QUOTES, "UTF-8");


if (!empty($votingid) && !empty($votingname)&& !empty($frage)&& !empty($antwort_1) && !empty($antwort_2)&& !empty($startdatum)&& !empty($enddatum)) {
    $voting_manager = new voting_manager();
    $voting_manager->update($votingid, $vorlesungsid, $votingname, $frage, $antwort_1, $antwort_2, $antwort_3, $antwort_4, $startdatum, $enddatum );

    // Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
    header('Location: uebersicht.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>

