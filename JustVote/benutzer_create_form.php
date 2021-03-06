<!DOCTYPE html>
<html>

<?php
include("inc/session_check.php");
include("inc/session_check_admin.php");
include("inc/header.php");
include("inc/navigation.php");
?>

<body>

<div class="container-fluid">
    <div class="col-lg-12">

        <?php
        // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
        if ($_GET["error"] == "1") {

            // HTML Code für Fehlermeldung erzeugen
            echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Bitte alle Felder ausfüllen </div>";
        }
        // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
        if ($_GET["error"] == "2") {

            // HTML Code für Fehlermeldung erzeugen
            echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Benutzer mit E-Mail existiert bereits </div>";
        }
        ?>

        <h1>Dozent hinzufügen </h1>


        <br>

        <!-- Beginn Formular "Benutzer hinzufügen" -->
        <form class="form-horizontal" role="form" action="benutzer_create_do.php" method="post">

            <!-- Texteingabefeld für Vorname-->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="vorname" id="vorname" placeholder="Vorname"
                           required="required">
                </div>
            </div>

            <!-- Texteingabefeld für Nachname-->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nachname" id="nachname" placeholder="Nachname" required="required">
                </div>
            </div>

            <!-- Texteingabefeld für E-Mail-->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail"required="required">
                </div>
            </div>

            <!-- Auswahlfeld der Rolle (Benutzer oder Admin)-->
            <div class="form-group">
                <div class="col-sm-6">
                    <select class="form-control" name="role">
                        <option value="Benutzer" selected>Benutzer</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>

            <!-- Button "Erstellen"-->
            <div class="form-group">
                <div class=" col-sm-6">
                    <button type="submit" class="btn btn-warning"> Erstellen</button>
                </div>
            </div>
            <!-- Ende Formular "Benutzer hinzufügen" -->

    </div> <!--"container-fluid" -->
</div> <!--"col-lg-12" -->
</body>
</html>



















