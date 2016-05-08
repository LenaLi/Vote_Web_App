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

                //Schleife hier eigentlich nicht n?tig, da id eindeutig und nur ein Datensatz zur?ckgegeben wird
                foreach($results as $result)
                {
                    echo '<h2> Teilnehmeranzahl: '.$result->Anzahl.'</h2>';
                }

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
                echo '<h2>'.$countAntwort[2].'</h2>'

                ?>

            </div>
         </div>

       </div>
    </div>
</div>
</body>
</html>