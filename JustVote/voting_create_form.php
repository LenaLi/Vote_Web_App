<?php
include("inc/session_check.php");
require_once ("Mapper/vorlesung.php");
require_once ("Mapper/vorlesung_manager.php");
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
$benutzerId=$_SESSION["benutzerid"];

// lese Vorlesungen mit Benutzer-ID aus Datenbank und speichere Informationen in einem Vorlesungen-Array
$vorlesungen=$vorlesungsmanager->findByBenutzerID($benutzerId);
?>
<div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h2>Voting hinzufügen</h2>

                    <?php
                    // Fehlermeldung, da Problem bei serverseitiger Überprüfung
                    // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
                    if ($_GET["error"]=="1"){

                        // HTML Code für Fehlermeldung erzeugen
                        echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Bitte alle Felder ausfüllen </div>";
                    }
                    ?>
                    
                    <!-- Beginn Formular "Voting hinzufügen" -->
                    <form class="form-horizontal" role="form" action="voting_create_do.php" method="post">

                        <!-- Texteingabefeld für Name des Votings-->
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="votingname" id="votingname" placeholder="Name des Votings"required="required">
                            </div>
                        </div>
                        <!-- Vorlesung auswählen: -->
                        <div class="form-group">
                            <div class="col-sm-3">
                            <label>Vorlesung auswählen: </label>
                            </div>
                            <!-- Auswahlfeld der Vorlesung-->
                            <div class="col-sm-3">
                        <select class="c-select" name="vorlesungsid">
                            <?php
                            // erzeugt die Auswahlmöglichkeiten der zum Benutzer gehörenden Vorlesungen
                            foreach($vorlesungen as $vorlesung){
                                echo "<option value='".$vorlesung->vorlesungsid."''>";
                                echo $vorlesung->vorlesungsname;
                                echo "</option>"; 
                            }
                            ?>
                        </select>
                            </div>

                        </div>
                        <!-- Texteingabefeld für die Frage des Votings -->
                        <div class="form-group">
                            <div class="col-sm-6"
                            <label for="frage"></label>
                            <textarea class="form-control" name="frage" rows="3" placeholder="Frage"required="required"></textarea>
                            </div>
                        </div>

                        <!-- Texteingabefeld für die Antwortmöglichkeit 1 -->
                         <div class="form-group">
                             <div class="col-sm-6"
                             <label for="antwort_1"></label>
                             <textarea class="form-control" name="antwort_1" rows="2" placeholder="Antwortmöglichkeit 1"required="required"></textarea>
                            </div>
                         </div>
                        <!-- Texteingabefeld für die Antwortmöglichkeit 2 -->
                        <div class="form-group">
                            <div class="col-sm-6"
                            <label for="antwort_2"</label>
                            <textarea class="form-control" name="antwort_2" rows="2" placeholder="Antwortmöglichkeit 2"required="required"></textarea>
                            </div>
                        </div>
                        <!-- Texteingabefeld für die Antwortmöglichkeit 3 -->
                        <div class="form-group">
                            <div class="col-sm-6"
                            <label for="antwort_3"</label>
                            <textarea class="form-control" name="antwort_3" rows="2" placeholder="Antwortmöglichkeit 3 (optional)"></textarea>
                            </div>
                        </div>
                        <!-- Texteingabefeld für die Antwortmöglichkeit 4 -->
                        <div class="form-group">
                             <div class="col-sm-6"
                            <label for="antwort_4"</label>
                            <textarea class="form-control" name="antwort_4" rows="2" placeholder="Antwortmöglichkeit 4 (optional)"></textarea>
                        </div>


                        <!-- Eingabefeld für die Startdatum, Startzeit -->
                        <div class="form-inline">
                            <div class="col-sm-6"
                            <label>Startzeitpunkt: </label>
                            <label for="startdatum"></label>
                            <input class="form-control" type="date" name="startdatum" placeholder="Startdatum" value="<?php echo date("d.m.Y",time()) ?>" required="required">
                            <input class="form-control" type="time" name="startzeit" placeholder="Startzeit"value="<?php echo date("H:i",time()) ?>"required="required">
                        </div>


                        <!-- Eingabefeld für die Enddatum, Endzeit -->
                        <div class="form-inline">
                            <div class="col-sm-6"
                            <label>Endzeitpunkt: </label>
                            <label for="enddatum"></label>
                            <input class="form-control" type="date" name="enddatum" placeholder="Enddatum"required="required">
                            <input class="form-control" type="time" name="endzeit" placeholder="Endzeit"required="required">
                        </div>
                            <!-- Button "Erstellen"-->
                            <div class="form-group">
                                <div class=" col-sm-6">
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







































