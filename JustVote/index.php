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
        // user not logged in
        $_SESSION = array();
        session_destroy();
        // Einbinden von Login Dialog
        include("inc/login_form.php");
        // Prüfung ob Benutzername und Passwort schon einmal falsch eingegeben wurden
        if($_GET["error"]==1){
            //TODO:Email in der Datenbank unique machen!!! @Renate
            ?>
            <div class=h5 style="color: #F07F31; font-weight: bold">E-Mail oder Passwort falsch!</div>
            <?php
        }
    } else {
        // user logged in
        // Weiterleitung zur Übersichts-Seite
        header('Location: uebersicht.php');
    }
?>

</body>
</html>