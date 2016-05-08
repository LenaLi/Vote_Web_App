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
                //  lese Ergebnis mit voting-ID aus Datenbank aus
                //$results = $ergebnismanager->findByErgebnis($_SESSION["votingid"], "antwort_1");

                //Parameter ?bergeben
                //$votingid = htmlspecialchars($_GET["votingid"], ENT_QUOTES, "UTF-8");

                // Objekt von result_manager erzeugen, welcher Datenbankverbindung besitzt
                $ergebnismanager =new result_manager();


                //$_SESSION["voting_id"] =7;

                // lese Ergebnis mit voting-ID aus Datenbank aus
                $results = $ergebnismanager->findByTeilnehmer($_SESSION["votingid"]);

                if($results==null)
                {
                    //kein Datensatz gefunden
                    echo '<h2>Kein Datensatz wurde gefunden</h2>';
                }

                //Schleife hier eigentlich nicht n?tig, da id eindeutig und nur ein Datensatz zur?ckgegeben wird
                foreach($results as $result)
                {
                    echo $result->anzahl;

                }

                ?>

            </div>
         </div>

       </div>
    </div>
</div>
</body>
</html>