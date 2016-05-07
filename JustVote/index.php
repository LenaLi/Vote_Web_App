<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<!-- Klasse Login-Body richtet alles mittig aus -->
<body class="mitte">
<!-- LOGO -->
<div class="mitte">
    <img src="http://mars.iuk.hdm-stuttgart.de/~ll033/pics/Logo_JustVote.svg" />
</div>


<?php
    session_start();
    if ($_SESSION ["login"]<>"1") {

        // Benutzer ist noch nicht eingeloggt
        $_SESSION = array();
        session_destroy();

        // Einbinden von Login Dialog
        include("inc/login_form.php");

        // Prüfung ob Benutzername und Passwort schon einmal falsch eingegeben wurden
        if($_GET["error"]==1){
            ?>
            <div class=h5 style="color: #F07F31; font-weight: bold">E-Mail oder Passwort falsch!</div>
            <?php
        }
    } else {
        // Benutzer ist eingeloggt
        // Weiterleitung zur Übersichts-Seite
        header('Location: uebersicht.php');
    }
?>

</body>
</html>