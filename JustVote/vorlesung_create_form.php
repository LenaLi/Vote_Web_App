<?php include("inc/session_check.php");?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php");?>

<body>

<?php include("inc/navigation.php");?>

<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h2>Vorlesung hinzufügen</h2>

                    <?php
                    // Fehlermeldung, da Problem bei serverseitiger Überprüfung
                    // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
                    if ($_GET["error"]=="1"){

                        // HTML Code für Fehlermeldung erzeugen
                        echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Bitte alle Felder ausfüllen </div>";
                    }
                    ?>

                    <!-- Beginn Formular "Vorlesung hinzufügen" -->
                    <form class="form-horizontal" role="form" action="vorlesung_create_do.php" method="post">

                        <!-- Texteingabefeld für Nummer der Vorlesung-->
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="vorlesungsnummer" id="vorlesungsnummer" placeholder="Nummer der Vorlesung" required="required">
                            </div>
                        </div>
                        <!-- Texteingabefeld für Vorlesungsname-->
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="vorlesungsname" id="vorlesungsname" placeholder="Vorlesungsname" required="required">
                            </div>
                        </div>
                        <!-- Button "Erstellen"-->
                        <div class="form-group">
                            <div class=" col-sm-6">
                                <button type="submit" class="btn btn-warning"> Erstellen</button>
                            </div>
                        </div>
                        <!-- Ende Formular "Vorlesung hinzufügen" -->
                </div>
            </div>
        </div>
</div>

</div>

</body>
</html>
