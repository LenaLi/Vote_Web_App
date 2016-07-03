<!DOCTYPE html>

<?php
include("inc/session_check.php");
include("inc/header.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort_manager.php");
require_once("Mapper/auswertung_manager.php");
require_once("Mapper/vorlesung_manager.php");
require_once ("Mapper/voting_manager.php");
include("inc/navigation_mitte.php");
?>


<!-- Test Darstellung -->

<?php
// Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
$vorlesungsmanager =new vorlesung_manager();

// Lese vorlesungen mit Benutzer-ID aus Datenbank aus
$vorlesungen = $vorlesungsmanager->findByBenutzerId($_SESSION['benutzerid']);

// Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
$votingmanager =new voting_manager();

/* TODO: Votings den Vorlesungen zu ordnen
if($vorlesungen!=null)
    foreach($vorlesungen as $vorlesung){
        echo
        "<div class='panel panel-default'>
    <div class='panel-heading' role='tab' id='heading.$vorlesung->vorlesungsid'>
        <h4 class='panel-title'>
            <a class= 'fa-plus-square-o' role='button' data-toggle='collapse' data-parent='#accordion' href='#$vorlesung->vorlesungsid' aria-expanded='true' aria-controls='$vorlesung->vorlesungsid'>
                $vorlesung->vorlesungsname  "," ($vorlesung->vorlesungsnummer)
            </a>
        </h4>
        <div id='$vorlesung->vorlesungsid' class='panel-collapse collapse ' role='tabpanel' aria-labelledby='heading.$vorlesung->vorlesungsid'>
            <div class='panel-body'>";
*/

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
    echo "<h1>";
    echo  $votings ["text"]."</br>";
    echo "</h1>";
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

echo "<h5>";
echo "Anzahl Teilnehmer:";
echo $zahlDerTeilnehmer;
echo "</h5>";

echo "<br/>";

//  Für Anzahl pro Antwort einmal jede antwort durchlaufen und zu jewelige antwort die zahl reinschreiben
$countAntwortInstanz = new auswertung_manager();
$Antwortarray = array();
$Antwortanzahl = array();
$resultsinpercent = array();
$results = array();
//Jede Antwort und die Zahl die dafür abgestimmt haben
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

        if ($zahlDerTeilnehmer!=0){
            $resultinpercent = round(($auswertung->Anzahl) / $zahlDerTeilnehmer * 100, 2);
        }
        else{
            $resultinpercent = 0;
        }

        array_push ($resultsinpercent, $resultinpercent);
        array_push($results,$auswertung->Anzahl);

    }
}




?>
<canvas id="myChart<?php echo $alleVotings->votingid?>" width="auto" height="auto" ></canvas>
<script>
    var ctx = document.getElementById("myChart<?php echo $alleVotings->votingid?>");
    var myChart<?php echo $alleVotings->votingid?> = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [

                // hier    müssen die Antwortmöglichkeiten rein

                <?php
                foreach($antworten as $antwort){
                    if(!empty($antwort["text"])){
                        echo "'".$antwort["text"]."',";
                    }

                }
                ?>

            ],
            datasets: [{
                label: '% der Stimmen',
                // hier kommen die Anzahl der Abstimmungen pro Antwort rein
                data: [
                    <?php
                    for($i=0; $i<sizeof($resultsinpercent); $i++){
                        echo $resultsinpercent[$i].",";
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
            legend:{
                display:true,

            },
            scales: {

                yAxes: [{
                    ticks: {
                        display:false,
                        beginAtZero:true,
                        max:100,
                        stepSize:10
                    }
                }]
            },

        }
    });
</script>

<?php
echo "</div>";
} ?>

</body>

