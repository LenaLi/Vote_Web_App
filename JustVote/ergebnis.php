<?php include ("inc/session_check.php");?>
<?php include ("inc/header.php");?>
<?php include ("inc/navigation.php");?>



<!DOCTYPE html>
<body>
<div id="page-wrapper">

    <div class="container-fluid">

                <h1>Ergebnis Ihres Votings</h1>


                <?php

                require_once("Mapper/result_manager.php");

                // --------------- Für Anzahl Teilnehmer ---------------------------------

                // Objekt von result_manager erzeugen, welcher Datenbankverbindung besitzt
                $ergebnismanager =new result_manager();
                // lese Teilnehmeranzahl mit voting-ID aus Datenbank aus
                $results = $ergebnismanager->countTeilnehmer($_SESSION["votingid"]);

                if($results==null)
                {
                    echo '<h2>Kein Datensatz wurde gefunden</h2>';
                }

                //results großer container an datensätzen, result ist nur ein datensatz
                foreach($results as $result)
                {
                    echo '<h2> Teilnehmeranzahl: '.$result->Anzahl.'</h2>';
                }

                // variable wird zum Rechnen benötigt
                $gesamtanzahlTeilnemer = $result->Anzahl;

                // --------------- Für Anzahl pro Antwort ---------------------------------
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
                           // array, speichert anzahl der antworten rein, minus eins weil: array fängt bei null an, unsere schleife fängt bei 1 an, aber müssen bei null anfangen wegen array
                            $countAntwort[$i-1] = $result2->Antwort;
                            echo '<h2> Teilnehmeranzahl: f&uumlr Antwort '.$i. ':    '.$result2->Antwort.'</h2>';
                        }
                }

                echo '<h2>'.$countAntwort[1].'</h2>';
                echo '<h2>'.$countAntwort[2].'</h2>';


                //<------------------  Rechnung  -------------------------

                // array immer das was man haben will minus eins weil sich alles verschiebt
                echo round($countAntwort [0]/$gesamtanzahlTeilnemer*100,2);
                $resultinpercent = round($countAntwort [0]/$gesamtanzahlTeilnemer*100,2);


                //for schleife: countAntwort minus 1 weil wir ja mim array bei null anfangen, dh immer eins weniger
                for ($i=0; $i<=$countAntwort-1; $i++)
                echo'
                        <div class="progress">
                          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="'.$resultinpercent.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$resultinpercent.'%">
                            <span class="sr-only">'.$resultinpercent.'</span>
                          </div>
                        </div>
                ';
                ?>




            </div>
         </div>

       </div>
    </div>
</div>
</body>
</html>