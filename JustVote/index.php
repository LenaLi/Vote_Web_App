<?php
include("inc/header.php");
include("inc/navigation_mitte.php");

session_start();

//Session wird gestartet, Prüfung ob Benutzer bereits angemeldet
if ($_SESSION ["login"] <> "1") {

// Wenn Benutzer noch nicht eingeloggt ist,
$_SESSION = array();
//Session wird zurückgesetzt und beendet
session_destroy();
// Login-Formular anzeigen!!
?>

<!DOCTYPE html>
<html>

<div class="mitte">
    <h1>Dozentenlogin </h1>
    <h4>für Dozenten der HdM Stuttgart</h4>
</div>
<br>

<!-- Beginn Login-Form-->
<div class="login">
    <form class="form-horizontal" role="form" action="login_do.php" method="post">

        <!-- Texteingabefeld für E-Mail-->
        <div class="form-group">
            <div class="col-sm-12">
                <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail">
            </div>
        </div>
        <!-- Eingabefeld für Passwort-->
        <div class="form-group">
            <div class="col-sm-12">
                <input type="password" class="form-control" name="password" id="password" placeholder="Passwort">
            </div>
        </div>

        <!-- Login Button-->
        <div class="form-group">
            <div class=" col-sm-offset-4 col-sm-12">
                <button type="submit" class="btn btn-warning">Login</button>
            </div>
        </div>
    </form>
    <!-- Ende Login-Form-->

    <a href="student_login_form.php">Student? Hier gehts zum Studentenlogin</a>
</div>

<!-- Fehlermeldungen-->

<?php
// Prüfung ob Benutzername oder Passwort falsch eingegeben wurden
if ($_GET["error"] == 1) {
    ?>
    <div class="btn btn-danger">E-Mail oder Passwort falsch!</div>

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