<?php
include("inc/session_check_student.php");
include("inc/voting_student.php");
include("inc/voting_student_manager.php");
include("inc/voting.php");
include("inc/voting_manager.php");
?>

<!DOCTYPE html>
<html>
<body>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Votings für Student</h1>


                        // Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
                        $votingmanager =new voting_manager();

                        // Lese voting mit Voting-ID aus Datenbank aus
                        $voting = $votingmanager->findByBenutzerId($_SESSION['benutzerid']);
