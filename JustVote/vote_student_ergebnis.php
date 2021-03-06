<!-- Ergebnisseite -->

<!DOCTYPE html>
<?php
include("inc/header.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort_manager.php");
require_once("Mapper/auswertung_manager.php");
include("inc/navigation_mitte.php");

// zur Votingid dazugehörige Frage wird aus Datenbank ausgelesen
$fragemanager = new frage_manager();

// Voting-ID aus GET Parameter auslesen
$votingid = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

// Lese Votings mit der Votingid aus der Datenbank aus
$votings = $fragemanager->getFragebyVotingid($votingid);

// Fehlermeldung, wenn der Student bereits abgestimmt hat
if ($_GET["error"] == "1") {
    echo "<div class='alert alert-danger' role='alert'>";
    echo "Du hast bereits abgestimmt!";
    echo "</div";
}
?>
<!-- Ausgabe der Frage des Votings-->
<h1>
    <?php
    echo $votings ["text"] . "</br>";
    ?>
</h1>


<?php

// zur Frageid dazugehörige Antworten wird aus Datenbank ausgelesen
$antwortmanager = new antwort_manager();
$frageid = $votings ["ID"];
$antworten = $antwortmanager->getAllbyFrageID($frageid);

// Objekt von auswertung_manager erzeugen, welcher Datenbankverbindung besitzt
$auswertungsmanager = new auswertung_manager();
// Lese Teilnehmeranzahl mit voting-ID aus Datenbank aus
$gesamtanzahlTeilnehmer = $auswertungsmanager->countTeilnehmer($votingid);

foreach ($gesamtanzahlTeilnehmer as $eintrag) {
    $zahlDerTeilnehmer = $eintrag->Anzahl;
}

echo "<h5>";
echo "( Anzahl Teilnehmer: ";
echo $zahlDerTeilnehmer ;
echo " )";
echo "</h5>";
echo '<div id="ergebnis">';
echo "<br/>";

$resultsinpercent = array();
foreach ($antworten as $eintraege) {

    if (!empty($eintraege["text"])) {
        //
        $countAntwortInstanz = new auswertung_manager();
        $auswertung = $countAntwortInstanz->countAntwort($eintraege["ID"]);

        echo "Antwort: ";
        echo $eintraege["text"];

        echo " (";
        echo $auswertung->Anzahl;
        echo " Stimmen)";
        echo "<br/>";

        if ($zahlDerTeilnehmer != 0) {
            $resultinpercent = round(($auswertung->Anzahl) / $zahlDerTeilnehmer * 100, 2);
        } else {
            $resultinpercent = 0;
        }
        array_push($resultsinpercent , $resultinpercent);
    }
}
?>
<br>

<canvas id="myChart" width="50%" height="50%"></canvas>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                // Antwortmöglichkeiten einfügen
                <?php
                foreach ($antworten as $antwort) {
                    if (!empty($antwort["text"])) {
                        echo "'" . $antwort["text"] . "',";
                    }
                }
                ?>

            ],
            datasets: [{
                label: '% of Votes',
                // Abstimmungsergebnis pro Antwort in Prozent
                data: [
                    <?php
                    for ($i = 0; $i < sizeof($resultsinpercent); $i++) {
                        echo $resultsinpercent[$i] . ",";
                    }
                    ?>

                ],
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
            },
            ]
        },
        options: {
            legend: {
                display: true,

            },
            scales: {

                yAxes: [{
                    ticks: {
                        display: false,
                        beginAtZero: true,
                        max: 100,
                        stepSize: 10
                    }
                }]
            },

        }
    });
</script>

</body>