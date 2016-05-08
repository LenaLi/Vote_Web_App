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

<?php include("inc/navigation.php");?>

<div id="wrapper">

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Beginn Formular "Benutzer updaten" -->
                    <h1>Benutzer aktualisieren </h1>

                    <?php
                    // Fehlermeldung, da Problem bei serverseitiger Überprüfung
                    // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
                    if ($_GET["error"]=="1"){

                        // HTML Code für Fehlermeldung erzeugen
                        echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Bitte alle Felder ausfüllen </div>";
                    }
                    ?>

                    <form action='benutzer_update_do.php' method='post'>
                        <input type='hidden' name='id' value='<?php echo $benutzer->id ?>' required="required"/>
                        Vorname:<br>
                        <input type='text' name='vorname' value='<?php echo $benutzer->vorname ?>'required="required" /><br>
                        Nachname:<br>
                        <input type='text' name='nachname' value='<?php echo $benutzer->nachname ?>'required="required" /><br>
                        <br>
                        E-Mail:<br>
                        <input type='text' name='email' value='<?php echo $benutzer->email ?>'required="required" /><br>
                        <br>
                        <br>
                        <input type='submit' value='update!' />
                    </form>
                    <!-- Ende Formular "Benutzer aktualisieren" -->
                </div>
            </div>
        </div>
    </div>

</div>

</div>
</body>
</html>