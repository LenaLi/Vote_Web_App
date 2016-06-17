<?php
include("inc/session_check_student.php");

include("Mapper/voting_student.php");
include("Mapper/voting_student_manager.php");
include("Mapper/voting.php");
include("Mapper/voting_manager.php");

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
                    <a href="">Logout</a>
                    <h1>Votings für Student</h1>

                        <?php

                        // Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
                        $voting_manager =new voting_manager();

                        // Objekt von voting_student_manager erzeugen, welcher Datenbankverbindung besitzt
                        $voting_student_manager =new voting_student_manager();

                        // Lese voting mit Voting-ID aus Datenbank aus
                        $voting_students = $voting_student_manager->findVotingsByStudent($_SESSION["studentid"]);
                        

                        foreach ($voting_students as $voting_student){

                            $votingid=$voting_student->votingid;
                            $voting=$voting_manager->findByVotingId($votingid);

                            echo "id". $voting->votingid."<br>";
                            echo "vorlesungsid".$voting->vorlesungsid."<br>";
                            echo "enddatum".$voting->enddatum."<br>";
                            echo "startdatum".$voting->startdatum."<br>"."<br>";
                            //echo "votingname".$voting->votingname."<br>";


}

                        ?>