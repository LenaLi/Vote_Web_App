<?php
require_once("Mapper/voting_manager.php");
require_once("Mapper/voting.php");

$votingid = (int)htmlspecialchars($_POST["votingid"], ENT_QUOTES, "UTF-8");
$vorlesungsid=(int)htmlspecialchars($_POST["vorlesungsid"], ENT_QUOTES, "UTF-8");
$votingname=htmlspecialchars($_POST["votingname"], ENT_QUOTES, "UTF-8");
$frage=htmlspecialchars($_POST["frage"], ENT_QUOTES, "UTF-8");
$antwort_1=htmlspecialchars($_POST["antwort_1"], ENT_QUOTES, "UTF-8");
$antwort_2=htmlspecialchars($_POST["antwort_2"], ENT_QUOTES, "UTF-8");
$antwort_3=htmlspecialchars($_POST["antwort_3"], ENT_QUOTES, "UTF-8");
$antwort_4=htmlspecialchars($_POST["antwort_4"], ENT_QUOTES, "UTF-8");
$startdatum=htmlspecialchars($_POST["startdatum"], ENT_QUOTES, "UTF-8");
$enddatum=htmlspecialchars($_POST["enddatum"], ENT_QUOTES, "UTF-8");


if (!empty($votingid) && !empty($votingname)&& !empty($frage)&& !empty($antwort_1) && !empty($antwort_2)&& !empty($startdatum)&& !empty($enddatum)) {
    $voting_manager = new voting_manager();
    $voting_manager->update($votingid, $vorlesungsid, $votingname, $frage, $antwort_1, $antwort_2, $antwort_3, $antwort_4, $startdatum, $enddatum );

    // Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
    header('Location: uebersicht.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>

