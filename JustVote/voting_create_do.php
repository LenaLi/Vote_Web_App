<?php include("inc/session_check.php");

require_once("Mapper/voting.php");
require_once("Mapper/voting_manager.php");

?>

<?php
//POST Parameter

$vorlesungsid=$_POST["vorlesungsid"];
$votingname=$_POST["votingname"];
$frage=$_POST["frage"];
$antwort_1=$_POST["antwort_1"];
$antwort_2=$_POST["antwort_2"];
$antwort_3=$_POST["antwort_3"];
$antwort_4=$_POST["antwort_4"];
$startdatum=$_POST["startdatum"]." ". $_POST["startzeit"];
$enddatum=$_POST["enddatum"]." ". $_POST["endzeit"];

//Datenbankverbindung aufbauen

$manager=new voting_manager();

$manager->create($vorlesungsid,$votingname,$frage,$antwort_1,$antwort_2,$antwort_3,$antwort_4,$startdatum,$enddatum);

//Weiterleitung auf uebersicht.php oder Fehlermeldung (keine Dopplungen, keine Berechtigungen)
header('Location: uebersicht.php');
?>