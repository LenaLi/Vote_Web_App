<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>
<?php include("inc/navigation_mitte.php"); ?>


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
$gesamtanzahlTeilnemer = $auswertungsmanager->countTeilnehmer($votingid);

print_r ($gesamtanzahlTeilnemer);
foreach ($gesamtanzahlTeilnemer as $eintrag) {
    $zahlDerTeilnehmer = $eintrag->Anzahl;
}

echo '<div id="ergebnis" style="width: 500px;">';


// --------------- Für Anzahl pro Antwort ---------------------------------

// einmal jede antwort durchlaufen damit ein balken generiert wird, zu jewelige antwort die zahl reinschreiben
echo '<div class="col-md-6">';

echo "<br/>";
foreach ($antworten as $eintraege) {

    $countAntwortInstanz = new auswertung_manager();
    $auswertung = $countAntwortInstanz->countAntwort($eintraege["ID"]);

    echo $auswertung->Anzahl;
    echo "<br/>";
    echo $zahlDerTeilnehmer;
    echo "<br/>";

    $resultinpercent = round(($auswertung->Anzahl)/$zahlDerTeilnehmer*100,2);
    echo $resultinpercent;

    // $eintrag ["text"] . $auswertung . "</br>";
    //print_r($auswertung);
    echo '
            <div class="progress">
                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
                    aria-valuenow="' . $resultinpercent . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $resultinpercent . '%">
                    <span class="sr-only">' . $resultinpercent . '</span>
                    </div>
            </div>';

}


echo "</div>"; ?>


    <canvas id="myChart" width="400" height="400"></canvas>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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

<?php


// ---------------  Details --------------------


echo '<h3> Teilnehmeranzahl: ' . '</h3>';
}