<?php include("inc/session_check.php"); ?>
<?php require_once("Mapper/voting.php"); ?>
<?php require_once("Mapper/voting_manager.php"); ?>

<?php

//POST Parameter werden ausgelesen
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
// Überprüfung, dass Felder nicht leer ist (z.B. Frage, antwort_1 darf nicht leer sein)

$vorlesungsid = htmlspecialchars($_POST["vorlesungsid"], ENT_QUOTES, "UTF-8");

if (!empty($votingname)&& !empty($frage)&& !empty($antwort_1) && !empty($antwort_2)&& !empty($startdatum)&& !empty($enddatum)) {

$manager=new voting_manager();

$manager->create($vorlesungsid, $votingname, $frage, $antwort_1,$antwort_2,$antwort_3,$antwort_4,$startdatum,$enddatum);

//Weiterleitung auf uebersicht.php oder Fehlermeldung (keine Dopplungen, keine Berechtigungen)

header('Location: uebersicht.php');
}
else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>

