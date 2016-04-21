<?php include("inc/session_check.php"); ?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<body>

<?php include("inc/navbar_loggedin.php"); ?>

<div id="wrapper">


    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Ihre Vorlesungen und Votings</h1>
                    <p></p>

                    <?php
                        // DB Abfrage zu Vorlesungen von Benutzer.....
                        require_once("Mapper/vorlesung.php");
                        require_once("Mapper/vorlesung_manager.php");
                        require_once("Mapper/voting_manager.php");

                        //DB Abfrage zu Votings
                        $vorlesungsmanager =new vorlesung_manager();
                        $vorlesungen = $vorlesungsmanager->findByBenutzerId($_SESSION['benutzerid']);

                        $votingmanager =new voting_manager();

                        if($vorlesungen!=null)
                        foreach($vorlesungen as $vorlesung){
                            echo "<table class='table table-hover'>";

                            // Überschriften der Tabellen
                                echo "<thead><tr>";
                                echo "<th colspan='7'>" . $vorlesung->vorlesungsid .", ". $vorlesung->vorlesungsname;
                                echo " <a class='fa fa-edit' href ='vorlesung_update_form.php?id=".$vorlesung->vorlesungsid."'></a>";
                                echo " <a class='fa fa-trash'href ='vorlesung_delete_do.php?id=".$vorlesung->vorlesungsid."'></a>";
                                echo  "<th>";
                                echo "</tr> </thead>";

                            $votings=$votingmanager->findByVorlesungsId($vorlesung->vorlesungsid);

                            foreach($votings as $voting){
                                    echo "<tr>";
                                    echo "<th>" . $voting->votingname . "</th>";


                                //Zeitraum des Votings
                                    $startdatum = $voting->startdatum;
                                    $startdatum = date("d.m.y H:i",strtotime($startdatum))." Uhr";
                                    $enddatum = $voting->enddatum;
                                    $enddatum = date("d.m.y H:i",strtotime($enddatum))." Uhr";
                                    echo "<td>" . $startdatum ." - ".$enddatum ."</td>";

                                // Status des Votings
                                echo "<td>";
                                if (strtotime($voting->startdatum)<=time()){
                                    if (strtotime($voting->enddatum)<=time()){
                                        echo "<td class='danger'> beendet";
                                    } else {
                                        echo "<td class='success'> aktiv";
                                    }
                                }
                                else {
                                    echo "<td class='warning'> ausstehend";
                                }
                                echo "</td>";


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

                                echo "<td>";
                                if (strtotime($voting->startdatum)<=time()){
                                    if (strtotime($voting->enddatum)<=time()){
                                        echo "";
                                    } else {
                                        echo "<td><a href = 'link_fuer_studenten.php?id=".$voting->votingid."'>Link</a></td>";
                                    }
                                }
                                echo "</td>";


                                // Bearbeiten des Votings
                                echo "<td><a class='fa fa-edit' href ='voting_update_form.php?id=".$voting->votingid."'></a></td>";
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
    </div>


</body>
</html>






