<?php
include("inc/session_check.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/frage.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort.php");
require_once("Mapper/antwort_manager.php");

?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<body>
<?php include("inc/navigation.php"); ?>

<?php
// Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
$vorlesungsmanager = new vorlesung_manager();

// BenutzerId aus Session auslesen
$benutzerId = $_SESSION["benutzerid"];

// lese Vorlesungen mit Benutzer-ID aus Datenbank und speichere Informationen in einem Vorlesungen-Array
$vorlesungen = $vorlesungsmanager->findByBenutzerID($benutzerId);
?>
<div id="page-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h2>Voting hinzufügen</h2>
                <br>

                <?php
                // Fehlermeldung, da Problem bei serverseitiger Überprüfung
                // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
                if ($_GET["error"] == "1") {

                    // HTML Code für Fehlermeldung erzeugen
                    echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Bitte alle Felder ausfüllen </div>";
                }
                ?>


                <!-- Beginn Formular "Voting hinzufügen" -->
                <form class="form-horizontal" role="form" action="voting_create_do.php" method="post">


                    <!-- Texteingabefeld für Name des Votings-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="votingname">Votingname:</label>
                            <input type="text" class="form-control" name='votingname' id='votingname'  placeholder="Votingname" required="required"/><br>
                        </div>
                    </div>

                    <!-- Vorlesung auswählen: -->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="auswählen">Vorlesung auswählen:</label>
                            <select  class="form-control" name='vorlesungsid' id='vorlesungsid'/><br>
                                <?php
                                // erzeugt die Auswahlmöglichkeiten der zum Benutzer gehörenden Vorlesungen
                                foreach ($vorlesungen as $vorlesung) {
                                    echo "<option value='" . $vorlesung->vorlesungsid . "''>";
                                    echo $vorlesung->vorlesungsname;
                                    echo "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <br>

                    <!-- Texteingabefeld für Frage des Votings-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="frage">Frage:</label>
                            <textarea type="text" class="form-control" name='frage' id='frage' rows="3" placeholder='frage' required="required"> </textarea><br>
                        </div>
                    </div>


                    <!-- Texteingabefeld für die Antwortmöglichkeit 1 -->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="antwort_1">Antwortmöglichkeit 1:</label>
                            <textarea type="text" class="form-control" name='antwort_1' id='antwort_1' rows="2"  placeholder="Antwortmöglichkeit 1" required="required"></textarea><br>
                        </div>
                    </div>

                    <!-- Texteingabefeld für die Antwortmöglichkeit 2 -->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="antwort_2">Antwortmöglichkeit 2:</label>
                            <textarea type="text" class="form-control" name='antwort_2' id='antwort_2' rows="2"  placeholder="Antwortmöglichkeit 2" required="required"></textarea><br>
                        </div>
                    </div>

                    <!-- Texteingabefeld für die Antwortmöglichkeit 3 -->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="antwort_3">Antwortmöglichkeit 3:</label>
                            <textarea type="text" class="form-control" name='antwort_3' id='antwort_3' rows="2"  placeholder="Antwortmöglichkeit 3" required="required"></textarea><br>
                        </div>
                    </div>

                    <!-- Texteingabefeld für die Antwortmöglichkeit 4 -->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="antwort_4">Antwortmöglichkeit 4:</label>
                            <textarea type="text" class="form-control" name='antwort_4' id='antwort_4' rows="2"  placeholder="Antwortmöglichkeit 4" required="required"></textarea><br>
                        </div>
                    </div>



                    <!-- Updatefeld Startdatum und Startzeit-->
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="startzeit">Startdatum</label>
                            <input type="date" class="form-control" name='startdatum' id='startdatum' value='<?php echo date("d.m.Y", time()) ?>' placeholder="Startdatum" required="required">
                        </div>

                        <div class="col-sm-3">
                            <label for="startzeit">Startzeit</label>
                            <input type="time" class="form-control" name='startzeit' id='startzeit' value='<?php echo date("H:i", time()) ?>' placeholder="Startzeit" required="required">
                        </div>
                    </div>

                    <br>
                    <!-- Updatefeld Enddatum und Endzeit-->
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="enddatum">Enddatum</label>
                            <input type="date" class="form-control" name='enddatum' id='enddatum' placeholder="Enddatum" required="required">
                        </div>

                        <div class="col-sm-3">
                            <label for="endzeit">Endzeit</label>
                            <input type="time" class="form-control" name='endzeit' id='endzeit' placeholder="Endzeit" required="required">
                        </div>
                    </div>

                    <br>
                    
                    <!-- Button "Erstellen"-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-warning"> Erstellen</button>
                        </div>
                    </div>

                </form>


<!-- Ende Formular "Voting hinzufügen" -->


</div>
</div>
</div>
</div>

</body>
</html>







































