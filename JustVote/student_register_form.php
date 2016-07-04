<!DOCTYPE html>
<html>
<?php include("inc/header.php"); ?>
<?php include("inc/navigation_mitte.php"); ?>

<body>

<div class="mitte">
    <h1>Registrierung</h1>
    <h4>für Studenten der HdM Stuttgart</h4>
</div>

<div class="login">
    <form class="form-horizontal" role="form" action="student_register_do.php" method="post">

        <!-- Texteingabefeld für Vorname-->
        <div class="form-group">
            <div class="col-sm-12">
                <input type="text" class="form-control" name="vorname" id="vorname" placeholder="Vorname"
                       required="required">
            </div>
        </div>
        <!-- Eingabefeld für Nachname-->
        <div class="form-group">
            <div class="col-sm-12">
                <input type="text" class="form-control" name="nachname" id="nachname" placeholder="Nachname"
                       required="required">
            </div>
        </div>

        <!-- Eingabefeld für Kürzel/E-Mail-->
        <div class="input-group">
            <input type="text" name="kuerzel" id="kuerzel" class="form-control" placeholder="Kürzel" required="required"
                   aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2">@hdm-stuttgart.de</span>
        </div>
        </br>


        <!-- Eingabefeld für Passwort-->
        <div class="form-group">
            <div class="col-sm-12">
                <input type="password" class="form-control" name="password1" id="password1" placeholder="Passwort"
                       required="required">
            </div>
        </div>
        <!-- Eingabefeld für Passwortwiederholung-->
        <div class="form-group">
            <div class="col-sm-12">
                <input type="password" class="form-control" name="password2" id="password2"
                       placeholder="Passwort wiederholen" required="required">
            </div>
        </div>

        <!-- Login Button-->
        <div class="form-group">
            <div class=" col-sm-offset-3 col-sm-12">
                <button type="submit" class="btn btn-warning">Registrieren</button>
            </div>
        </div>
    </form>
</div>

<!--Fehlermeldungen -->
<?php
if ($_GET["error"] == "1") {
    ?>
    <div class="btn btn-danger">Passwort stimmt nicht überein!</div>
    <?php
}
?>
<?php
if ($_GET["error"] == "2") {
    ?>
    <div class="btn btn-danger">Bitte alle Felder ausfüllen!</div>
    <?php
}
?>
<?php
if ($_GET["error"] == "3") {
    ?>
    <div class="btn btn-danger">Keine HdM E-Mail Adresse!</div>
    <?php
}
?>
<?php
if ($_GET["error"] == "4") {
    ?>
    <div class="btn btn-danger">Benutzer wurde bereits angelegt!</div>
    <?php
}
?>

</body>
</html>











