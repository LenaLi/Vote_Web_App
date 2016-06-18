<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>
<!-- LOGO + mittige Ausrichtung -->
<?php include("inc/navigation_mitte.php"); ?>


<?php
    session_start();
    if ($_SESSION ["login"]<>"1") {

        // Benutzer ist noch nicht eingeloggt
        $_SESSION = array();
        session_destroy();
?>

 <div class="mitte">
     <h1>Dozentenlogin </h1>
     <h4>für Dozenten der HdM Stuttgart</h4>
</div>

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
                    <a href="student_login_form.php">Student? Hier gehts zum Studentenlogin</a>
</div>

<?php
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