<?php
include("inc/session_check.php");
//include("inc/session_check_admin.php");
include("inc/header.php");
include("inc/navigation.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/voting_manager.php");
?>


<!DOCTYPE html>
<html>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <h1>Ihre Vorlesungen und Votings </h1>
                </br>

                <?php

                // Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
                $vorlesungsmanager = new vorlesung_manager();

                // Lese vorlesungen mit Benutzer-ID aus Datenbank aus
                $vorlesungen = $vorlesungsmanager->findByBenutzerId($_SESSION['benutzerid']);

                // Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
                $votingmanager = new voting_manager();

                if ($vorlesungen != null)
                    foreach ($vorlesungen as $vorlesung) {
                        echo
                        "<div class='panel panel-default'>
                                    <div class='panel-heading' role='tab' id='heading.$vorlesung->vorlesungsid'>
                                        <h4 class='panel-title'>
                                            <a class='fa fa-angle-right 'role='button' data-toggle='collapse' data-parent='#accordion'
                                             href='#$vorlesung->vorlesungsid' aria-expanded='true' aria-controls='$vorlesung->vorlesungsid'></a>
                                             <a  role='button' data-toggle='collapse' data-parent='#accordion'
                                             href='#$vorlesung->vorlesungsid' aria-expanded='true' aria-controls='$vorlesung->vorlesungsid'>
                                              $vorlesung->vorlesungsname  ", " ($vorlesung->vorlesungsnummer)
                                              </a>
                                              <div class=button-right>
                                              <a class='fa fa-edit' href ='vorlesung_update_form.php?id=" . $vorlesung->vorlesungsid . "'></a>
                                              <a class='fa fa-trash'href ='vorlesung_delete_do.php?id=" . $vorlesung->vorlesungsid . "'></a>
                                              </div>
                                              </h4>
                                        <div id='$vorlesung->vorlesungsid' class='panel-collapse collapse ' role='tabpanel' aria-labelledby='heading.$vorlesung->vorlesungsid'>
                                        <div class='panel-body'>
                                        <table class='table table-hover'>";

                        // Überschriften der Tabellen
                        echo "<thead><tr>";

                        echo "<th colspan='6'> Name </th>";
                        echo "<th colspan='1'> Zeitraum </th>";
                        echo "<th colspan='3'> Status </th>";
                        echo "<th colspan='3'>  </th>";

                        echo " </tr></thead>";

                        // Lese Votings mit Vorlesungs-ID aus Datenbank aus
                        $votings = $votingmanager->findByVorlesungsId($vorlesung->vorlesungsid);

                        foreach ($votings as $voting) {


                            // Farbe der Zeile (Status des Votings)
                            if (strtotime($voting->startdatum) <= time()) {
                                if (strtotime($voting->enddatum) <= time()) {
                                    echo "<tr class='danger'>";
                                    echo "<th colspan='6'>" . $voting->votingname . " </th>";
                                } else {
                                    echo "<tr class='success'>";
                                    echo "<th colspan='6'>" . $voting->votingname . " </th>";
                                }
                            } else {
                                echo "<tr class='warning'>";
                                echo "<th colspan='6'>" . $voting->votingname . " </th>";
                            }

                            //Zeitraum des Votings
                            $startdatum = $voting->startdatum;
                            $startdatum = date("d.m.y, H:i", strtotime($startdatum)) . " Uhr";
                            $enddatum = $voting->enddatum;
                            $enddatum = date("d.m.y, H:i", strtotime($enddatum)) . " Uhr";
                            echo "<td colspan='1'>Start: " . $startdatum . " Ende: " . $enddatum .

                                "</td>";

                            // Status des Votings
                            if (strtotime($voting->startdatum) <= time()) {
                                if (strtotime($voting->enddatum) <= time()) {
                                    echo "<td colspan='3'> beendet </td>";
                                } else {
                                    echo "<td colspan='3'> aktiv</td>";
                                }
                            } else {
                                echo "<td colspan='3'> offen</td>";
                            }

                            //Start + Stoppbutton
                            echo "<td>";
                            if (strtotime($voting->startdatum) <= time()) {
                                if (strtotime($voting->enddatum) <= time()) {
                                    echo "<a class='fa fa-times'></a>";
                                } else {
                                    echo "<a class='fa fa-pause' href='voting_stop.php?id=" . $voting->votingid . "'></a>";
                                }
                            } else {
                                echo "<a class='fa fa-play' href='voting_start.php?id=" . $voting->votingid . "'></a>";
                            }
                            echo "</td>";


                            if (strtotime($voting->startdatum) <= time()) {
                                if (strtotime($voting->enddatum) <= time()) {

                                    //Wenn Umfrage beendet: Ergebnisse der Umfrage
                                    echo "<td><a class='fa fa-bar-chart' href = 'vote_student_ergebnis.php?id=" . $voting->votingid . "'></a></td>";

                                } else {

                                    //Wenn Umfrage läuft: Link zum Abstimmen
                                    echo "<td><a class='fa fa-external-link' href = 'link_fuer_studenten.php?id=" . $voting->votingid . "'></a></td>";
                                }
                            } else {
                                //Wenn Umfrage aussteht
                                echo "<td><a class='fa fa-edit' href ='voting_update_form.php?id=" . $voting->votingid . "'></a></td>";
                            }


                            //Löschen des Votings
                            echo "<td><a class='fa fa-trash' href ='voting_delete_do.php?id=" . $voting->votingid . "'></a></td>";

                            echo "</tr>";

                        }

                        echo "</table>";
                        echo "</br>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "<br>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>






