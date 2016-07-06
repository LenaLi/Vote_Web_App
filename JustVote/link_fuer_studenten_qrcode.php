<!-- Hier wird der QR Code generiert der dann unter Link_fuer_studenten.php mit der jeweiligen ID eingebunden wird -->

<?php
include("inc/phpqrcode/qrlib.php");
require_once("Mapper/voting_manager.php");
require_once("Mapper/voting.php");

// ID wird ausgelesen und an URL drangehängt
$aktuellesvoting = $_GET['id'];

// Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
$voting_manager = new voting_manager();

// lese Voting aus Datenbank mit der Funktion findByVotingID
$voting = $voting_manager->findByVotingId($aktuellesvoting);


// QR CODE Generierung --> siehe inc/phpqecode

ob_start("callback");

// Hier wird der Inhalt des QR codes definiert --> Link mit der aktuellen Voting ID
$codeText = 'https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/vote_student_form.php?id=' . $aktuellesvoting;

// end of processing here
$debugLog = ob_get_contents();
ob_end_clean();

// gibt Bild im Browser als PNG Stream aus --> wird auf Seite mit dem Link für Studenten eingebunden
QRcode::png($codeText);

echo ' <a href= https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/vote_student_form.php?id=' . $aktuellesvoting . ">https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/vote_student_form.php?id='.$aktuellesvoting</a>";
?>