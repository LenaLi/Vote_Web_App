<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>
<?php include("inc/navigation_mitte.php"); ?>


<div class="mitte">
    <h1>Studentenlogin </h1>
    <h4>für Studenten der HdM Stuttgart</h4>
</div>
<br>
<div class="login">
    <form class="form-horizontal" role="form" action="student_login_do.php" method="post">

        <input type="hidden" name="votingid" value="

                    <?php echo $_GET["votingid"] ?>"
        />

        <!-- Texteingabefeld für Vorname-->
        <div class="form-group">
            <div class="col-sm-12">
                <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail"
                       required="required">
            </div>
        </div>

        <!-- Eingabefeld für Nachname-->
        <div class="form-group">
            <div class="col-sm-12">
                <input type="password" class="form-control" name="password" id="password" placeholder="Passwort"
                       required="required">
            </div>
        </div>

        <!-- Login Button-->
        <div class="form-group">
            <div class=" col-sm-offset-4 col-sm-12">
                <button type="submit" class="btn btn-warning">Login</button>
            </div>
        </div>
    </form>
</div>

<!-- Link Registrieren-->
<a href="student_register_form.php">Registrieren</a> <br>


<!-- // Prüfung ob Benutzername oder Passwort falsch eingegeben wurden-->
<?php
if ($_GET["error"] == "1") {
    ?>
    <div class="btn btn-danger">E-Mail oder Passwort falsch!</div>

    <?php
}
?>


</html>



