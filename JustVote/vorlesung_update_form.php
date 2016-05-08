<?php
include("inc/session_check.php");
require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/vorlesung.php");
?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<?php
// Vorlesung-ID aus GET Parameter auslesen
$vorlesungsId = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

// Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
$vorlesung_manager = new vorlesung_manager();

// Lese Vorlesung mit Vorlesungs-ID aus Datenbank aus
$vorlesung = $vorlesung_manager->findByVorlesungsId($vorlesungsId);

echo $vorlesungsId;
?>


<body>

<?php include("inc/navigation.php"); ?>

<div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h1>Vorlesung bearbeiten</h1>

                    <?php
                    // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
                    if ($_GET["error"]=="1"){

                        // HTML Code für Fehlermeldung erzeugen
                        echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Bitte alle Felder ausfüllen </div>";
                    }
                    ?>

                    <!-- Beginn Formular "Vorlesung aktualisieren" -->
                    <form action='vorlesung_update_do.php' method='post'>
                        
                        Vorlesungsid:<br>
                        <input type='text' name='vorlesungsid' value='<?php echo $vorlesung->vorlesungsid ?>'
                        </br>
                        Vorlesungsname:<br>
                        <input type='text' name='vorlesungsname' value='<?php echo $vorlesung->vorlesungsname ?>'
                        </br>

                        <input type='submit' value='update!' />
                    </form>
                    <!-- Ende Formular "Vorlesung aktualisieren" -->
                </div>
            </div>
        </div>
</div>

</div>
</body>
</html>