<?php
include("inc/session_check.php");
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
                    <h1>Passwort ändern<?php echo $benutzer->id ?></h1>

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