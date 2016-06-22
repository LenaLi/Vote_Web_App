<?php
include("inc/session_check.php");
require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/vorlesung.php");
?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<?php
// Vorlesung-ID aus GET Parameter auslesen
$vorlesungsId = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

// Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
$vorlesung_manager = new vorlesung_manager();

// Lese Vorlesung mit Vorlesungs-ID aus Datenbank aus
$vorlesung = $vorlesung_manager->findByVorlesungsId($vorlesungsId);

?>


<body>

<?php include("inc/navigation.php"); ?>

<div id="page-wrapper">

        <div class="container-fluid">

                    <h1>Vorlesung aktualisieren</h1>

                    <?php
                    // Fehlermeldung, da Problem bei serverseitiger Überprüfung
                    // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
                    if ($_GET["error"]=="1"){

                        // HTML Code für Fehlermeldung erzeugen
                        echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Bitte alle Felder ausfüllen </div>";
                    }
                    ?>


                    <!-- Beginn Formular "Vorlesung aktualisieren" -->
                    <form class="form-horizontal" role="form" action="vorlesung_update_do.php" method="post">

                        <!-- Feld für ID der Vorlesung-->
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" name="vorlesungsid" value='<?php echo $vorlesung->vorlesungsid ?>'/>
                            </div>
                        </div>

                        <!-- Texteingabefeld für Vorlesungsnummer-->
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="vorlesungsnummer" value='<?php echo $vorlesung->vorlesungsnummer ?>'/>
                            </div>
                        </div>

                        <!-- Texteingabefeld für Vorlesungsname-->
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="vorlesungsname" value='<?php echo $vorlesung->vorlesungsname ?>'/>
                            </div>
                        </div>


                        <!-- Button "Erstellen"-->
                        <div class="form-group">
                            <div class=" col-sm-6">
                                <button type="submit" class="btn btn-warning"> Aktualisieren</button>
                            </div>
                        </div>
                        <!-- Ende Formular "Vorlesung aktualisieren" -->




                </div>
            </div>
        </div>
</div>

</div>
</body>
</html>