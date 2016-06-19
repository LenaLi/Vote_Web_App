<?php
include("inc/session_check_student.php");
require_once("Mapper/student_manager.php");
require_once("Mapper/student.php");
?>

<!DOCTYPE html>
<html>

<?php

// Student-ID aus SESSION auslesen
$id = htmlspecialchars($_SESSION["studentid"], ENT_QUOTES, "UTF-8");

// Objekt von student_manager erzeugen, welcher Datenbankverbindung besitzt
$student_manager = new student_manager();

// lese Student mit Student-ID aus Datenbank aus
$student = $student_manager->findById($id);

?>

<?php include("inc/header.php"); ?>

<body>

<?php include("inc/navigation_student.php");?>


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">


                <!-- Beginn Formular "Passwort aktualisieren" -->
                <h2>Passwort aktualisieren</h2>

                <?php
                // Fehlermeldung, da Problem bei serverseitiger Überprüfung
                // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
                if ($_GET["error"]=="1"){

                    // HTML Code für Fehlermeldung erzeugen
                    echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Bitte alle Felder ausfüllen </div>";
                }
                ?>

                <!-- Beginn Formular "Passwort ändern" -->
                <form class="form-horizontal" role="form" action="student_password_update_do.php" method="post">

                    <!-- Übergabe der Benutzer ID-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type='hidden' name='id' value='<?php echo $student->id ?>' />
                        </div>
                    </div>

                    <!-- Eingabe neues Passwort-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            Neues  Passwort eingeben:
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