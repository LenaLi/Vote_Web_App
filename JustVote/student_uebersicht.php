<?php
//include("inc/session_check_student.php");
include("Mapper/voting_student.php");
include("Mapper/voting_student_manager.php");
include("Mapper/voting.php");
include("Mapper/voting_manager.php");
?>

<!DOCTYPE html>
<html>
<body>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Votings für Student</h1>

                        <?php

                        // Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
                        $voting_student_manager =new voting_student_manager();

                        // Lese voting mit Voting-ID aus Datenbank aus
                        $votings = $voting_student_manager->findVotingsByStudent(100,12);

                        foreach ($votings as $voting){
                            echo "id". $voting->votingid."<br>";
                            echo "vorlesungsid".$voting->vorlesungsid."<br>";
                            echo "enddatum".$voting->enddatum."<br>";
                            echo "startdatum".$voting->startdatum."<br>"."<br>";

}

                        ?>