<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>
<?php include("inc/navigation_mitte.php"); ?>


                <h2>Login für Studenten</h2>
    <h5>mit einem Account der Hochschule der Medien</h5>


<div class="login">
                <form class="form-horizontal" role="form" action="student_login_do.php" method="post">


                    <input type="hidden" name="votingid" value ="

                    <?php echo $_GET["votingid"] ?>"
                           />

                    <!-- Texteingabefeld für E-Mail-->
                    <div class="glyphicon-baby-formula">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail" required="required">
                        </div>
                    </div>
</br>

                    <!-- Texteingabefeld für Passwort-->
                    <div class="glyphicon-baby-formula">
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Passwort">
                        </div>
                    </div>



                    <!-- Login Button-->
                    <div class="glyphicon-baby-formula">
                        <div class=" col-sm-offset-4 col-sm-12">
                            <button type="submit" class="btn btn-warning">Login</button>
                        </div>
                    </div>


                    </br>
                    <!-- Link Registrieren-->
                    <a href="student_register_form.php">Registrieren</a>



                </form>
</div>
</br>

<?php
if($_GET["error"]=="1"){
    ?>
    <div class="btn btn-danger">E-Mail oder Passwort falsch!</div>

    <?php
}
?>





</html>



