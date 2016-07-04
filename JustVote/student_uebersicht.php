<?php
include("inc/session_student.php");
include("inc/session_check_student.php");
include("Mapper/voting_student.php");
include("Mapper/voting_student_manager.php");
include("Mapper/voting.php");
include("Mapper/voting_manager.php");
include("Mapper/vorlesung.php");
include("Mapper/vorlesung_manager.php");
include("inc/navigation_student.php");
include("inc/header.php");


// session check
if ($_SESSION["studentlogin"] != "1") {
    header('Location: student_login_form.php');
    die();
}
?>

<!DOCTYPE html>
<html>
<body>
<div id="page-wrapper">
    <div class="container-fluid">

                    <h1> Deine Votings </h1>
                    <h4>Hier siehst du alle Votings, an denen du teilgenommen hast.</h4>
                    <br>

        <?php
        // Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
        $voting_manager = new voting_manager();

        // Objekt von voting_student_manager erzeugen, welcher Datenbankverbindung besitzt
        $voting_student_manager = new voting_student_manager();

        // Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
        $vorlesung_manager = new vorlesung_manager();

        // Lese voting mit Voting-ID aus Datenbank aus
        $voting_students = $voting_student_manager->findVotingsByStudent($_SESSION["studentid"]);


        foreach ($voting_students as $voting_student) {

            $votingid = $voting_student->votingid;
            $voting = $voting_manager->findByVotingId($votingid);
            $vorlesung = $vorlesung_manager->findByVorlesungsId($voting->vorlesungsid);

            echo
            "<div class='panel panel-default'>
                                    <div class='panel-heading' role='tab' id='heading.$voting->votingid'>
                                        <h4 class='panel-title'>
                                             <a class= 'fa-plus-square-o' role='button' data-toggle='collapse' data-parent='#accordion' href='#$voting->votingid' aria-expanded='true' aria-controls='$voting->votingid'>
                                             $voting->votingname  ", "  </a>
                                             <a class= 'fa fa-angle-right' role='button' data-toggle='collapse' data-parent='#accordion' href='#$voting->votingid' aria-expanded='true' aria-controls='$voting->votingid'>
                                             $voting->votingname  ","  </a>
                                        </h4>
                                        <div id='$voting->votingid' class='panel-collapse collapse ' role='tabpanel' aria-labelledby='heading.$voting->votingid'>
                                        <div class='panel-body'>
                                        <table class='table table-hover'>";

            //Vorlesungsname
            echo "Vorlesung: " . $vorlesung->vorlesungsname . "<br>";

            //Zeitraum des Votings
            $startdatum = $voting->startdatum;
            $startdatum = date("d.m.y H:i", strtotime($startdatum)) . " Uhr";
            echo "Startdatum: " . $startdatum . "<br>";

            $enddatum = $voting->enddatum;
            $enddatum = date("d.m.y H:i", strtotime($enddatum)) . " Uhr";
            echo "Enddatum: " . $enddatum . "<br>";


            //Button "Ergebnis einsehen"
            echo "<a href='vote_student_ergebnis.php?id=" . $voting->votingid . "'> Ergebnis einsehen </a>";

            echo "</div>";

        } 
        ?>

