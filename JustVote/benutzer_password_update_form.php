<?php
include("inc/session_check.php");
require_once("Mapper/benutzer_manager.php");
require_once("Mapper/benutzer.php");
?>

<!DOCTYPE html>
<html>

<?php

// Benutzer-ID aus SESSION auslesen
$id = htmlspecialchars($_SESSION["benutzerid"], ENT_QUOTES, "UTF-8");

// Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
$benutzer_manager = new benutzer_manager();

// lese Benutzer mit Benutzer-ID aus Datenbank aus
$benutzer = $benutzer_manager->findById($id);

?>

<?php include("inc/header.php"); ?>

<body>

<?php include("inc/navigation.php");?>

<div id="wrapper">

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Beginn Formular "Passwort aktualisieren" -->
                    <h1>Neues Passwort anlegen </h1>

                    <?php
                    // Fehlermeldung, da Problem bei serverseitiger Überprüfung
                    // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
                    if ($_GET["error"]=="1"){

                        // HTML Code für Fehlermeldung erzeugen
                        echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Bitte alle Felder ausfüllen </div>";
                    }
                    ?>

                    <form action='benutzer_password_update_do.php' method='post'>
                        <input type='hidden' name='id' value='<?php echo $benutzer->id ?>' />
                        Neues Passwort eingeben:<br>
                        <input type='password' name='password1'  /><br>
                        <br>
                        Neues Passwort wiederholen:<br>
                        <input type='password' name='password2'  /><br>
                        <br>
                        <input type='submit' value='Passwort ändern' />
                    </form>
                    <!-- Ende Formular "Passwort aktualisieren" -->
                </div>
            </div>
        </div>
    </div>

</div>

</div>
</body>
</html>