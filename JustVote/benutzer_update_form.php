<?php
include("inc/session_check.php");
include("inc/session_check_admin.php");
require_once("Mapper/benutzer_manager.php");
require_once("Mapper/benutzer.php");
?>

<!DOCTYPE html>
<html>

<?php
// Benutzer-ID aus GET Parameter auslesen
$id = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

// Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
$benutzer_manager = new benutzer_manager();

// lese Benutzer mit Benutzer-ID aus Datenbank aus
$benutzer = $benutzer_manager->findById($id);

echo $id;
?>

<?php include("inc/header.php"); ?>

<body>

<?php include("inc/navigation.php"); ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Beginn Formular "Benutzer updaten" -->

        <h2>Benutzer aktualisieren </h2>

        <?php
        // Fehlermeldung, da Problem bei serverseitiger Überprüfung
        // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
        if ($_GET["error"] == "1") {

            // HTML Code für Fehlermeldung erzeugen
            echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Bitte alle Felder ausfüllen </div>";
        }
        ?>

        <!-- Beginn Formular "Benutzer bearbeiten" -->
        <form class=form-horizontal role="form" action='benutzer_update_do.php' method='post'>

            <!-- Feld für ID der Vorlesung-->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="hidden" class="form-control" name="id" value='<?php echo $benutzer->id ?>'
                           required="required"/>
                </div>
            </div>

            <!-- Texteingabefeld für Benutzername-->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="vorname" value='<?php echo $benutzer->vorname ?>'
                           required="required"/>
                </div>
            </div>

            <!-- Texteingabefeld für Nachname-->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nachname" value='<?php echo $benutzer->nachname ?>'
                           required="required"/>
                </div>
            </div>

            <!-- Texteingabefeld für Email-->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value='<?php echo $benutzer->email ?>'
                           required="required"/>
                </div>
            </div>

            <!-- Button "Bearbeiten"-->
            <div class="form-group">
                <div class=" col-sm-6">
                    <button type="submit" class="btn btn-warning"> Aktualisieren</button>
                </div>
            </div>
        </form>
        <!-- Ende Formular "Benutzer aktualisieren" -->
    </div>
</div>
</div>

</div>

</div>
</body>
</html>