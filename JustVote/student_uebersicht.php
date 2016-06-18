<?php
include("inc/session_check_student.php");
include("Mapper/voting_student.php");
include("Mapper/voting_student_manager.php");
include("Mapper/voting.php");
include("Mapper/voting_manager.php");
include("Mapper/vorlesung.php");
include("Mapper/vorlesung_manager.php");

// session check
if($_SESSION["studentlogin"]!="1"){
    header('Location: student_login_form.php');
    die();
}

?>

<!DOCTYPE html>
<html>
<body>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="student_logout.php">Logout</a>
                    <h1>Votings, an denen du teilgenommen hast</h1>

                        <?php

                        // Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
                        $voting_manager =new voting_manager();

                        // Objekt von voting_student_manager erzeugen, welcher Datenbankverbindung besitzt
                        $voting_student_manager =new voting_student_manager();

                        // Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
                        $vorlesung_manager =new vorlesung_manager();

                        // Lese voting mit Voting-ID aus Datenbank aus
                        $voting_students = $voting_student_manager->findVotingsByStudent($_SESSION["studentid"]);


                        foreach ($voting_students as $voting_student){

                            $votingid=$voting_student->votingid;
                            $voting=$voting_manager->findByVotingId($votingid);
                            $vorlesung=$vorlesung_manager->findByVorlesungsId($voting->vorlesungsid);

                            //echo "id". $voting->votingid."<br>";
                            echo "<div>";
                            echo "<h1>"."Votingname:".$voting->votingname."</h1>";

                            echo "Vorlesung:".$vorlesung->vorlesungsname."<br>";

                            //Zeitraum des Votings
                            $startdatum = $voting->startdatum;
                            $startdatum = date("d.m.y H:i",strtotime($startdatum))." Uhr";
                            echo "Startdatum:".$startdatum."<br>";

                            $enddatum = $voting->enddatum;
                            $enddatum = date("d.m.y H:i",strtotime($enddatum))." Uhr";
                            echo "Enddatum:".$enddatum."<br>";


                            //Button "Ergebnis einsehen"
                            echo "<a href='vote_student_ergebnis.php?id=".$voting->votingid."'> Ergebnis einsehen </a>";

                            echo "</div>";

                             }
                        ?>

