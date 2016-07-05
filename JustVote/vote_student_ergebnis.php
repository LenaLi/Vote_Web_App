<!DOCTYPE html>
<?php
include("inc/header.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort_manager.php");
require_once("Mapper/auswertung_manager.php");
include("inc/navigation_mitte.php");

//holt die zur votingid dazugehoerige Frage aus der DB-Abfrage
$fragemanager = new frage_manager();
$votingid = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");
$votings = $fragemanager->getFragebyVotingid($votingid);

//Fehlermeldung, wenn der Student bereits abgestimmt hat
if ($_GET["error"] == "1") {
    echo "<div class='alert alert-danger' role='alert'>";
    echo "Du hast bereits abgestimmt!";
    echo "</div";
}
?>

<h1>
    <?php
    echo $votings ["text"] . "</br>";
    ?>
</h1>

<?php
//holt die zur frageID dazugehoerigen Antworten aus der DB-Abfrage
$antwortmanager = new antwort_manager();
$frageid = $votings ["ID"];
$antworten = $antwortmanager->getAllbyFrageID($frageid);

$VOTINGID = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");
$votingmanager = new frage_manager();
$votings = $votingmanager->getFragebyVotingid($_SESSION["votingid"]);

$Antwortarray = array();
$Antwortanzahl = array();


// --------------- Für Anzahl Teilnehmer ---------------------------------
// Objekt von auswertung_manager erzeugen, welcher Datenbankverbindung besitzt
$auswertungsmanager = new auswertung_manager();
// lese Teilnehmeranzahl mit voting-ID aus Datenbank aus
$gesamtanzahlTeilnehmer = $auswertungsmanager->countTeilnehmer($votingid);


foreach ($gesamtanzahlTeilnehmer as $eintrag) {
    $zahlDerTeilnehmer = $eintrag->Anzahl;
}

echo "Anzahl Teilnehmer: ";
echo $zahlDerTeilnehmer;


echo '<div id="ergebnis">';


// --------------- Für Anzahl pro Antwort ---------------------------------

// einmal jede antwort durchlaufen damit ein balken generiert wird, zu jewelige antwort die zahl reinschreiben

$countAntwortInstanz = new auswertung_manager();

echo "<br/>";
$resultsinpercent = array();
foreach ($antworten as $eintraege) {

    if (!empty ($eintraege["text"])) {

        $auswertung = $countAntwortInstanz->countAntwort($eintraege["ID"]);


        echo "Antwort: ";
        echo $eintraege["text"];
        array_push($Antwortarray, $eintraege["text"]);

        echo " (";
        echo $auswertung->Anzahl;
        echo " Stimmen)";
        array_push($Antwortanzahl, $auswertung->Anzahl);
        echo "<br/>";

        if ($zahlDerTeilnehmer != 0) {
            $resultinpercent = round(($auswertung->Anzahl) / $zahlDerTeilnehmer * 100, 2);
        } else {
            $resultinpercent = 0;
        }
        array_push($resultsinpercent, $resultinpercent);

    }
}


// ---------------  Details --------------------


?>

<canvas id="myChart" width="50%" height="50%"></canvas>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [

                // hier    müssen die Antwortmöglichkeiten rein

                <?php
                foreach ($antworten as $antwort) {
                    if (!empty($antwort["text"])) {
                        echo "'" . $antwort["text"] . "',";
                    }
                }
                ?>

            ],
            datasets: [{
                label: '# of Votes',
                // hier kommen die Anzahl der Abstimmungen pro Antwort rein
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