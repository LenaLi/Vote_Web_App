<?php
require_once("inc/session_student.php");
require_once("Mapper/auswertung_manager.php");
require_once("Mapper/voting_student_manager.php");
require_once("Mapper/student_manager.php");


$postantwort=htmlspecialchars($_POST["rb_antworten"], ENT_QUOTES, "UTF-8");
$postvoting=htmlspecialchars($_POST["votingid"], ENT_QUOTES, "UTF-8");
$postfrage=htmlspecialchars($_POST["frageid"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");

$student_manager = new student_manager();
$email .= "@hdm-stuttgart.de";
$student = $student_manager->findByEmail($email);

if($student == null){
    $student_manager->create(null,null,$email,null);
    // TODO warum nochmalig die zuweisung an die variable Student?
    $student = $student_manager->findByEmail($email);
}

$voting_student_manager = new voting_student_manager();
$status = $voting_student_manager->create($postvoting, $student->student_id);

if($status == null){
    // Eintrag in DB schon vorhanden
    header('Location: vote_student_ergebnis.php?id=' . $postvoting.'&error=1');
    die();
}

//Objekt von Auswertung wird erzeugt
$auswertungsmanager =new auswertung_manager();
$auswertungsmanager ->create($postfrage, $postantwort, $postvoting);

echo "voting ".$postvoting;
echo "<br /> student ".$student->student_id;

$votings = $voting_student_manager->findVotingsByStudent($student->student_id);

$votingIds = array();
foreach ($votings as $voting){
    array_push($votingIds,$voting->votingid);
}

//header redirect
header('Location: vote_student_ergebnis.php?id=' . $postvoting);
?>