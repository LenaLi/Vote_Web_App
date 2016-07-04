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

<?php include("inc/navigation.php"); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <!-- Beginn Formular "Passwort aktualisieren" -->
                <h2>Passwort aktualisieren</h2>

                <?php
                // Fehlermeldung, da Problem bei serverseitiger Überprüfung
                // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
                if ($_GET["error"] == "1") {

                    // HTML Code für Fehlermeldung erzeugen
                    echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Bitte alle Felder ausfüllen </div>";
                }
                ?>

                <!-- Beginn Formular "Passwort ändern" -->
                <form class="form-horizontal" role="form" action="benutzer_password_update_do.php" method="post">

                    <!-- Übergabe der Benutzer ID-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type='hidden' name='id' value='<?php echo $benutzer->id ?>'/>
                        </div>
                    </div>

                    <!-- Eingabe neues Passwort-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            Neues Passwort eingeben:
                            <input class=form-control type='password' name='password1'>
                        </div>
                    </div>

                    <!-- Neues Passwort wiederholen-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            Neues Passwort wiederholen:
                            <input class=form-control type='password' name='password2'>
                        </div>
                    </div>

                    <!-- Button "Passwort ändern"-->
                    <div class="form-group">
                        <div class=" col-sm-6">
                            <button type="submit" class="btn btn-warning"> Passwort ändern</button>
                        </div>
                    </div>
                    <!-- Ende Formular "Passwort aktualisieren" -->
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>