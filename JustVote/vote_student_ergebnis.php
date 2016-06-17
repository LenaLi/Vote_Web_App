<!DOCTYPE html>
<?php
//include("inc/session_check.php");
include("inc/header.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort_manager.php");
require_once("Mapper/auswertung_manager.php");
include("inc/navigation_mitte.php");
?>


<?php
//holt die zur votingid dazugehoerige Frage aus der DB-Abfrage
$fragemanager =new frage_manager();
$votingid = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");
$votings = $fragemanager->getFragebyVotingid ($votingid);

//FEHLERMELDUNG
if($_GET["error"]=="1"){
    echo "Du hast schon abgestimmt!";
}

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

        echo "Anzahl Teilnehmer: ";
        echo $zahlDerTeilnehmer;


    echo '<div id="ergebnis" style="width: 500px;">';


    // --------------- Für Anzahl pro Antwort ---------------------------------

    // einmal jede antwort durchlaufen damit ein balken generiert wird, zu jewelige antwort die zahl reinschreiben

        $countAntwortInstanz = new auswertung_manager();

    echo "<br/>";
    foreach ($antworten as $eintraege) {

if (!empty ($eintraege["text"])) {

        $auswertung = $countAntwortInstanz->countAntwort($eintraege["ID"]);

        echo "Anzahl Votes: ";
        echo $auswertung->Anzahl;
        echo "<br/>";
        echo "Antwort: ";
        echo $eintraege ["text"];
        echo "<br/>";

        $resultinpercent = round(($auswertung->Anzahl)/$zahlDerTeilnehmer*100,2);
        echo $resultinpercent ." %";


        echo '
            <div class="progress">
                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
                    aria-valuenow="' . $resultinpercent . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $resultinpercent . '%">
                    <span class="sr-only">' . $resultinpercent . '</span>
                    </div>
            </div>';

    }
    }
    echo "</div>"; 


    // ---------------  Details --------------------




?>

<canvas id="myChart" width="400" height="400"></canvas>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [

             // hier    müssen die Antwortmöglichkeiten rein

                <?php



                echo $eintraege ["text"];
            ?>

            ],
            datasets: [{
                label: '# of Votes',
                // hier kommen die Anzahl der Abstimmungen pro Antwort rein
                data: [12, 19, 3, 5],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
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
