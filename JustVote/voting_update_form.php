<?php
include("inc/session_check.php");
require_once("Mapper/voting_manager.php");
require_once("Mapper/voting.php");
require_once("Mapper/frage.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort.php");
require_once("Mapper/antwort_manager.php");

?>

<!DOCTYPE html>
<html>
<?php include("inc/header.php");?>

<?php
// GET Parameter auslesen
$votingId = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

// Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
$voting_manager = new voting_manager();

// lese Voting mit Voting-ID aus Datenbank aus
$voting = $voting_manager->findByVotingId($votingId);
echo $votingId;
?>

<body>
<?php include("inc/navigation.php"); ?>

<div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h1>Vorlesung bearbeiten</h1>

                    <?php
                    // Fehlermeldung, da Problem bei serverseitiger Überprüfung
                    // Fehlermeldung anzeigen, wenn Error Parameter mitgeliefert wird
                    if ($_GET["error"]=="1"){

                        // HTML Code für Fehlermeldung erzeugen
                        echo "<div class='alert alert-danger'> <strong> Fehler: </strong>Bitte alle Felder ausfüllen </div>";
                    }
                    ?>
                    
                    <!-- Beginn Formular "Voting aktualisieren" -->
                    <form action='voting_update_do.php' method='post'>
                        <input type='hidden' name='votingid' value='<?php echo $voting->votingid ?>' /
                        <br>
                        <input type='hidden' name='vorlesungsid' value='<?php echo $voting->vorlesungsid ?>' /
                        <br>
                        Votingname:<br>
                        <input type='text' name='votingname' value='<?php echo $voting->votingname ?>' required="required"/><br>
                        Frage:<br>
                        <input type='text' name='frage' value='<?php echo $voting->frage ?>' required="required"/><br>
                        Antwortmöglichkeit 1:<br>
                        <input type='text' name='antwort_1' value='<?php echo $voting->antwort_1 ?>' required="required"/><br>
                        Antwortmöglichkeit 2:<br>
                        <input type='text' name='antwort_2' value='<?php echo $voting->antwort_2 ?>' required="required"/><br>
                        Antwortmöglichkeit 3: (optional)<br>
                        <input type='text' name='antwort_3' value='<?php echo $voting->antwort_3 ?>'/><br>
                        Antwortmöglichkeit 4: (optional)<br>
                        <input type='text' name='antwort_4' value='<?php echo $voting->antwort_4 ?>'/><br>

                        <!-- Updatefeld für die Startdatum, Startzeit -->
                        <div class="form-group">
                            <div class="col-sm-3"
                            <label>Startzeitpunkt: </label>
                            <label for="startdatum"></label>
                            <?php
                            $startDatum = date("Y-m-d",strtotime($voting->startdatum));
                            $startZeit = date("H:i",strtotime($voting->startdatum));
                            ?>
                            <input class="form-control" type="date" name="startdatum" placeholder="Startdatum"required="required" value='<?php echo $startDatum ?>'/>
                            <input class="form-control" type="time" name="startzeit" placeholder="Startzeit"required="required"value='<?php echo $startZeit ?>'/>
                        </div>


                        <!-- Updatefeld für die Enddatum, Endzeit -->
                        <div class="form-group">
                            <div class="col-sm-3"
                            <label>Endzeitpunkt: </label>
                            <label for="enddatum"></label>
                            <?php
                             $endDatum = date("Y-m-d",strtotime($voting->enddatum));
                            $endZeit = date("H:i",strtotime($voting->enddatum));
                            ?>
                            <input class="form-control" type="date" name="enddatum" placeholder="Enddatum"required="required" value='<?php echo $endDatum ?>'/>
                            <input class="form-control" type="time" name="endzeit" placeholder="Endzeit"required="required"value='<?php echo $endZeit ?>'/>
                        </div>

                        <!-- Button "Update"-->
                        <div class="form-group">
                            <div class=" col-sm-6">
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </div>

                    </form>
                    <!-- Ende Formular "Voting aktualisieren" -->
                </div>
            </div>
        </div>
    </div>

</div>

</div>
</body>
</html>