<!DOCTYPE html>

<?php
include("inc/session_check.php");
include("inc/header.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort_manager.php");
require_once("Mapper/auswertung_manager.php");
require_once ("Mapper/voting_manager.php");
include("inc/navigation_mitte.php");
?>


<?php


    $votingmanager =new voting_manager();
    $AllVotings = $votingmanager->findAll();


    foreach ($AllVotings as $alleVotings) {


        //holt die zur votingid dazugehoerige Frage aus der DB-Abfrage
        $fragemanager =new frage_manager();
        $votingid = $alleVotings->votingid;
        $votings = $fragemanager->getFragebyVotingid ($votingid);
        ?>

            <h1>
                <?php
                echo  $votings ["text"]."</br>";
                ?>
            </h1>

        <?php
        //holt die zur frageID dazugehoerigen antworten aus der DB-Abfrage
        $antwortmanager =new antwort_manager();
        $frageid = $votings ["ID"];
        $antworten = $antwortmanager->getAllbyFrageID($frageid);

        $VOTINGID = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");
        $votingmanager =new frage_manager();
        //$_SESSION["votingid"] = $VOTINGID;*/
        $votings = $votingmanager->getFragebyVotingid($_SESSION["votingid"]);


    // --------------- Für Anzahl Teilnehmer ---------------------------------
    // Objekt von result_manager erzeugen, welcher Datenbankverbindung besitzt
    $auswertungsmanager =new auswertung_manager();
    // lese Teilnehmeranzahl mit voting-ID aus Datenbank aus
    $gesamtanzahlTeilnehmer = $auswertungsmanager->countTeilnehmer($votingid);


    foreach ($gesamtanzahlTeilnehmer as $eintrag) {
        $zahlDerTeilnehmer = $eintrag->Anzahl;
    }

        echo "Anzahl Teilnehmer:";
        echo $zahlDerTeilnehmer;

        //  Für Anzahl pro Antwort einmal jede antwort durchlaufen und zu jewelige antwort die zahl reinschreiben
        $countAntwortInstanz = new auswertung_manager();


        //Jede Antwort und die Zahl die dafür abgestimmt haben
        foreach ($antworten as $eintraege) {

            if (!empty ($eintraege["text"])) {
                $auswertung = $countAntwortInstanz->countAntwort($eintraege["ID"]);
                echo "<br/>";
                echo "Antwort: ";
                echo $eintraege ["text"];
                echo "<br/>";
                $resultinpercent = $auswertung->Anzahl;
                echo $resultinpercent ;
            }
        }
        echo '<canvas id="myChart" width="400" height="400"></canvas>';
        echo "</div>";
        }


?>
    <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [
                        <?php $antworten[0]->$eintrag  ?>,
                        <?php $antworten[1]->$eintrag   ?>,
                        <?php $antworten[2]->$eintrag   ?>,
                        <?php $antworten[3]->$eintrag   ?>],
                    datasets: [{
                        label: '# of Votes',
                        data: [
                            <?php $resultinpercent[0]  ?>,
                            <?php $resultinpercent[1]  ?>,
                            <?php $resultinpercent[2]   ?>,
                            <?php $resultinpercent[3]   ?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>





</body>

