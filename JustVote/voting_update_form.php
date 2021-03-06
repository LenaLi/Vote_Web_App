<?php
include("inc/session_check.php");
require_once("Mapper/voting_manager.php");
require_once("Mapper/voting.php");
require_once("Mapper/frage.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort.php");
require_once("Mapper/antwort_manager.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");

?>

<!DOCTYPE html>
<html>
<?php include("inc/header.php"); ?>

<?php
// GET Parameter auslesen
$votingId = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

// Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
$voting_manager = new voting_manager();

// lese Voting mit Voting-ID aus Datenbank aus
$voting = $voting_manager->findByVotingId($votingId);

// Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
$vorlesung_manager = new vorlesung_manager();

// lese Vorlesung mit Vorlesungsid aus Datenbank aus
$vorlesung = $vorlesung_manager->findByVorlesungsId($voting->vorlesungsid);

// Wenn Voting nicht zu Benutzer gehört, dann wird der Zugriff verweigert
if ($vorlesung->benutzerid != $_SESSION["benutzerid"]) {
    header('Location: uebersicht.php');
    die();
}

// Objekt von frage_manager erzeugen, welcher Datenbankverbindung besitzt
$frage_manager = new frage_manager();

// lese Frage mit Voting-ID aus Datenbank aus
$frage = $frage_manager->getFragebyVotingid($votingId);

// Objekt von antwort_manager erzeugen, welcher Datenbankverbindung besitzt
$antwort_manager = new antwort_manager();

// lese Antwort mit Frage-ID aus Datenbank aus
$antworten = $antwort_manager->getAllByFrageID($frage->ID);
?>

<body>
<?php include("inc/navigation.php"); ?>


    <div class="container-fluid">
            <div class="col-lg-12">

                <h2>Voting aktualisieren</h2>
                <br>

                <?php
                // Fehlermeldung, da Problem bei serverseitiger Überprüfung
                // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
                if ($_GET["error"] == "1") {

                    // HTML Code für Fehlermeldung erzeugen
                    echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Bitte alle Felder ausfüllen </div>";
                }
                ?>

                <!-- Beginn Formular "Voting aktualisieren" -->

                <form class="form-group" action='voting_update_do.php' method='post'>

                    <!-- Updatefeld für Votingname -->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="votingname">Votingname</label>
                            <input type="text" class="form-control" name='votingname' id='votingname' placeholder='Votingname'value='<?php echo $voting->votingname ?>' required="required"/><br>
                        </div>
                    </div>


                    <!-- Updatefeld für Frage des Votings-->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="frage">Frage:</label>
                            <textarea type="text" class="form-control" name='frage' id='frage' rows="3" placeholder='Frage' required="required"> <?php echo $frage->text ?> </textarea> <br>
                        </div>
                    </div>


                    <!-- Updatefeld für die Antworten -->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="antwort_1">Antwortmöglichkeit 1</label>
                            <input type="text" class="form-control" name='antwort_1' id='antwort_1' placeholder='Antwortmöglichkeit 1'value='<?php echo $antworten[0]->text ?>' required="required"/><br>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="antwort_2">Antwortmöglichkeit 2</label>
                            <input type="text" class="form-control" name='antwort_2' id='antwort_2' placeholder='Antwortmöglichkeit 2' value='<?php echo $antworten[1]->text ?>' required="required"/><br>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="antwort_3">Antwortmöglichkeit 3 (optional)</label>
                            <input type="text" class="form-control" name='antwort_3' id='antwort_3' placeholder='Antwortmöglichkeit 3' value='<?php echo $antworten[2]->text ?>'>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="antwort_4">Antwortmöglichkeit 4 (optional)</label>
                            <input type="text" class="form-control" name='antwort_4' id='antwort_4' placeholder='Antwortmöglichkeit 4'value='<?php echo $antworten[3]->text ?>'><br>
                        </div>
                    </div>

                    <!--Abfrage Votingzeitraum -->
                    <?php
                    $startDatum = date("Y-m-d", strtotime($voting->startdatum));
                    $startZeit = date("H:i", strtotime($voting->startdatum));
                    $endDatum = date("Y-m-d", strtotime($voting->enddatum));
                    $endZeit = date("H:i", strtotime($voting->enddatum));
                    ?>

                    <!-- Updatefeld Startdatum und Startzeit-->
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="startdatum">Startdatum</label>
                            <input type="date" class="form-control" name='startdatum' id='startdatum' placeholder='Startdatum' value='<?php echo $startDatum ?>' required="required">
                        </div>

                         <div class="col-sm-3">
                             <label for="startzeit">Startzeit</label>
                             <input type="time" class="form-control" name='startzeit' id='startzeit' placeholder='Startzeit'value='<?php echo $startZeit ?>' required="required">
                          </div>
                    </div>

                    <!-- Updatefeld Enddatum und Endzeit-->
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="enddatum">Enddatum</label>
                            <input type="date" class="form-control" name='enddatum' id='enddatum' placeholder='Enddatum'value='<?php echo $endDatum ?>' required="required">
                        </div>

                        <div class="col-sm-3">
                            <label for="endzeit">Endzeit</label>
                            <input type="time" class="form-control" name='endzeit' id='endzeit' placeholder='Endzeit'value='<?php echo $endZeit ?>' required="required"><br>
                        </div>
                    </div>

                    <!-- Button "Update"-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-warning">Aktualisieren</button>
                        </div>
                    </div>

                    <!-- Übergabe der Voting und Vorlesung ID-->
                    <input type='hidden' name='votingid' value='<?php echo $voting->votingid ?>'/><br>
                    <input type='hidden' name='vorlesungsid' value='<?php echo $voting->vorlesungsid ?>'/><br>
                </form>
                <!-- Ende Formular "Voting aktualisieren" -->
            </div>
        </div>
    </div>


</body>
</html>