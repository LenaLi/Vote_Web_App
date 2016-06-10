<?php
include("inc/session_check.php");
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
                    <h1>Ihre Vorlesungen und Votings (neue Darstellung)</h1>

                    </br>



                    <?php

                    // Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
                    $vorlesungsmanager =new vorlesung_manager();

                    // Lese vorlesungen mit Benutzer-ID aus Datenbank aus
                    $vorlesungen = $vorlesungsmanager->findByBenutzerId($_SESSION['benutzerid']);

                    // Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
                    $votingmanager =new voting_manager();

                    if($vorlesungen!=null)
                        foreach($vorlesungen as $vorlesung){
                            echo " <h4> Vorlesungsnummer:  $vorlesung->vorlesungsnummer  "," Name der Vorlesung:  $vorlesung->vorlesungsname;
                            <a class='fa fa-edit' href ='vorlesung_update_form.php?id=".$vorlesung->vorlesungsid."'></a>
                            <a class='fa fa-trash'href ='vorlesung_delete_do.php?id=".$vorlesung->vorlesungsid."'></a> </h4> " ;
                            echo "<div class='container'>";
                            echo "<div class='row'>";


                            // Lese Votings mit Vorlesungs-ID aus Datenbank aus
                            $votings=$votingmanager->findByVorlesungsId($vorlesung->vorlesungsid);




                            foreach($votings as $voting){

                                // Status des Votings
                                if (strtotime($voting->startdatum)<=time()){
                                    if (strtotime($voting->enddatum)<=time()){

                                      echo  "<div class='col-xs-5'>";
                                      echo  "<div class='list-group'>";
                                      echo  "<div class='list-group-item list-group-item-danger'>";
                                      echo  "<div class='panel-heading'> Umfrage  $voting->votingname  (beendet) </div>";

                                    } else {
                                      echo  "<div class='col-xs-5'>";
                                      echo  "<div class='list-group'>";
                                      echo  "<div class='list-group-item list-group-item-success'>";
                                      echo  "<div class='panel-heading'> Umfrage  $voting->votingname  (aktiv) </div>";
                                    }
                                }
                                else {
                                    echo  "<div class='col-xs-5'>";
                                    echo  "<div class='list-group'>";
                                    echo "<div class='list-group-item list-group-item-warning'>";
                                    echo "<div class='panel-heading'> Umfrage  $voting->votingname  (ausstehend) </div>";
                                }



                               echo "<div class='panel-body'>";

                                //Zeitraum des Votings
                                $startdatum = $voting->startdatum;
                                $startdatum = date("d.m.y H:i",strtotime($startdatum))." Uhr";
                                $enddatum = $voting->enddatum;
                                $enddatum = date("d.m.y H:i",strtotime($enddatum))." Uhr";
                                echo "<h5>"  .  $startdatum ." - ".$enddatum ."</h5>";


                                //Start + Stoppbutton
                                echo "<td>";
                                if (strtotime($voting->startdatum)<=time()){
                                    if (strtotime($voting->enddatum)<=time()){
                                        echo "<i class='fa fa-times'></i>";
                                    } else {
                                        echo "<a class='fa fa-pause' href='voting_stop.php?id=".$voting->votingid."'></a>";
                                    }
                                }
                                else {
                                    echo "<a class='fa fa-play' href='voting_start.php?id=".$voting->votingid."'></a>";
                                }
                                echo "</td>";


                                // Link des Votings //

                                if (strtotime($voting->startdatum)<=time()){
                                    if (strtotime($voting->enddatum)<=time()){

                                        //Wenn Umfrage beendet: Ergebnisse der Umfrage
                                        echo "<td><a class='fa fa-bar-chart' href = 'vote_student_ergebnis.php?id=".$voting->votingid."'></a></td>";

                                    } else {

                                        //Wenn Umfrage läuft: Link zum Abstimmen
                                        echo "<td><a class='fa fa-external-link' href = 'link_fuer_studenten.php?id=".$voting->votingid."'></aclass></td>";
                                    }
                                }
                                else {
                                    //Wenn Umfrage aussteht
                                    echo "<td><a class='fa fa-edit' href ='voting_update_form.php?id=".$voting->votingid."'></a></td>";
                                }


                                //Löschen des Votings
                                echo "<td><a class='fa fa-trash' href ='voting_delete_do.php?id=".$voting->votingid."'></a></td>";

                                echo "</tr>";



                               echo "</div>";
                               echo "</div>";
                                echo "</div>";
                                echo "</div>";





                            }

                        }
                    ?>
                </div>
                        </div>
                    </div>
                </div>






                    <h1>Ihre Vorlesungen und Votings (alte Darstellung)</h1>

                    <?php
                    
                        // Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
                        $vorlesungsmanager =new vorlesung_manager();

                        // Lese vorlesungen mit Benutzer-ID aus Datenbank aus
                        $vorlesungen = $vorlesungsmanager->findByBenutzerId($_SESSION['benutzerid']);

                        // Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
                        $votingmanager =new voting_manager();

                        if($vorlesungen!=null)
                        foreach($vorlesungen as $vorlesung){
                            echo "<table class='table table-hover'>";

                            

                            // Überschriften der Tabellen
                                echo "<thead><tr>";
                                echo "<th colspan='7'>" . $vorlesung->vorlesungsnummer .", ". $vorlesung->vorlesungsname;
                                echo " <a class='fa fa-edit' href ='vorlesung_update_form.php?id=".$vorlesung->vorlesungsid."'></a>";
                                echo " <a class='fa fa-trash'href ='vorlesung_delete_do.php?id=".$vorlesung->vorlesungsid."'></a>";
                                echo  "<th>";
                                echo "</tr> </thead>";

                            // Lese Votings mit Vorlesungs-ID aus Datenbank aus
                            $votings=$votingmanager->findByVorlesungsId($vorlesung->vorlesungsid);

                            foreach($votings as $voting){
                                    echo "<tr>";
                                    echo "<th colspan='7'>" . $voting->votingname . "</th>";


                                //Zeitraum des Votings
                                    $startdatum = $voting->startdatum;
                                    $startdatum = date("d.m.y H:i",strtotime($startdatum))." Uhr";
                                    $enddatum = $voting->enddatum;
                                    $enddatum = date("d.m.y H:i",strtotime($enddatum))." Uhr";
                                    echo "<td colspan='3'>" . $startdatum ." - ".$enddatum ."</td>";

                                // Status des Votings
                                if (strtotime($voting->startdatum)<=time()){
                                    if (strtotime($voting->enddatum)<=time()){
                                        echo "<td colspan='6' class='danger'> beendet";
                                    } else {
                                        echo "<td colspan='6' class='success'> aktiv";
                                    }
                                }
                                else {
                                    echo "<td colspan='6'  class='warning'> ausstehend";
                                }


                                //Start + Stoppbutton
                                    echo "<td>";
                                    if (strtotime($voting->startdatum)<=time()){
                                        if (strtotime($voting->enddatum)<=time()){
                                            echo "<i class='fa fa-times'></i>";
                                        } else {
                                            echo "<a class='fa fa-pause' href='voting_stop.php?id=".$voting->votingid."'></a>";
                                        }
                                    }
                                    else {
                                        echo "<a class='fa fa-play' href='voting_start.php?id=".$voting->votingid."'></a>";
                                    }
                                    echo "</td>";


                                // Link des Votings // TODO: Link für das Voting (QR usw.) eingeben

                                if (strtotime($voting->startdatum)<=time()){
                                    if (strtotime($voting->enddatum)<=time()){

                                        //Wenn Umfrage beendet: Ergebnisse der Umfrage
                                        echo "<td><a class='fa fa-bar-chart' href = 'vote_student_ergebnis.php?id=".$voting->votingid."'></a></td>";

                                    } else {

                                        //Wenn Umfrage läuft: Link zum Abstimmen
                                        echo "<td><a href = 'link_fuer_studenten.php?id=".$voting->votingid."'>Link</a></td>";
                                    }
                                }
                                else {
                                    //Wenn Umfrage aussteht
                                    echo "<td><a class='fa fa-edit' href ='voting_update_form.php?id=".$voting->votingid."'></a></td>";
                                }


                                //Löschen des Votings
                                echo "<td><a class='fa fa-trash' href ='voting_delete_do.php?id=".$voting->votingid."'></a></td>";

                                    echo "</tr>";
                            }
                            echo "</table>";
                        }
                    ?>
                </div>
                </div>
        </div>
    </div>


</body>
</html>






