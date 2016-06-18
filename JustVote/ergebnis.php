<?php
include ("inc/session_check.php");
include ("inc/header.php");
include ("inc/navigation.php");
?>



<!DOCTYPE html>
<body>
<div id="page-wrapper">

    <div class="container-fluid">

                <h1>Ergebnis Ihres Votings</h1>


                <?php

                require_once("Mapper/result_manager.php");

                // --------------- F�r Anzahl Teilnehmer ---------------------------------

                // Objekt von result_manager erzeugen, welcher Datenbankverbindung besitzt
                $ergebnismanager =new result_manager();
                // lese Teilnehmeranzahl mit voting-ID aus Datenbank aus
                $results = $ergebnismanager->countTeilnehmer($_SESSION["votingid"]);

                if($results==null)
                {
                    echo '<h2>Kein Datensatz wurde gefunden</h2>';
                }

                //results gro�er container an datens�tzen, result ist nur ein datensatz
                foreach($results as $result)
                {
                    // variable wird zum Rechnen ben�tigt
                    $gesamtanzahlTeilnemer = $result->Anzahl;
                }

                // --------------- F�r Anzahl pro Antwort ---------------------------------
                for ($i=1; $i<=$_SESSION ["anzahlantworten"]; $i++)
                {

                        // Objekt von result_manager erzeugen, welcher Datenbankverbindung besitzt
                        $ergebnismanager2 =new result_manager();
                        // lese Teilnehmeranzahl mit voting-ID aus Datenbank aus
                        $results2 = $ergebnismanager2->findByErgebnis($_SESSION["votingid"], "antwort_".$i);

                        if($results2==null)
                        {
                            echo '<h2>Kein Datensatz wurde gefunden</h2>';
                        }

                        foreach($results2 as $result2)
                        {
                           // array, speichert anzahl der antworten rein, minus eins weil: array f�ngt bei null an, unsere schleife f�ngt bei 1 an, aber m�ssen bei null anfangen wegen array
                            $countAntwort[$i-1] = $result2->Antwort;
                        }
                }



                //<------------------  Rechnung  -------------------------

                echo '<div id="ergebnis" style="width: 500px;">';

                //for schleife: countAntwort minus 1 weil wir ja mim array bei null anfangen, dh immer eins weniger
                for ($i=0; $i<=$_SESSION ["anzahlantworten"]-1; $i++)
                {
                    // array immer das was man haben will minus eins weil sich alles verschiebt
                    echo "<p>".round($countAntwort[$i]/$gesamtanzahlTeilnemer*100,2)."%</p>";
                    $resultinpercent = round($countAntwort [$i]/$gesamtanzahlTeilnemer*100,2);
                    echo'
                        <div class="progress">
                          <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="'.$resultinpercent.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$resultinpercent.'%">
                            <span class="sr-only">'.$resultinpercent.'</span>
                          </div>
                        </div>
                    ';
                }

                echo '</div>';

                // ---------------  Details --------------------

                echo '<h3> Teilnehmeranzahl: ' . $gesamtanzahlTeilnemer . '</h3>';
                for ($i=0; $i<=$_SESSION ["anzahlantworten"]-1; $i++)
                {
                    echo '<p>Teilnehmeranzahl f&uumlr Antwort ' . ($i+1) . ':    ' . $countAntwort[$i] . '</p>';
                }

                ?>




            </div>
         </div>

       </div>
    </div>
</div>
</body>
</html>