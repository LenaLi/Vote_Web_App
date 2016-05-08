<?php
include("inc/session_check.php");
require_once("Mapper/voting_manager.php");
require_once("Mapper/voting.php");
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
                        Antwortmöglichkeit 3:<br>
                        <input type='text' name='antwort_3' value='<?php echo $voting->antwort_3 ?>'/><br>
                        Antwortmöglichkeit 4:<br>
                        <input type='text' name='antwort_4' value='<?php echo $voting->antwort_4 ?>'/><br>
                        Startdatum:<br>
                        <input type='text' name='startdatum' value='<?php echo $voting->startdatum ?>'required="required"/><br>
                        Enddatum:<br>
                        <input type='text' name='enddatum' value='<?php echo $voting->enddatum ?>'required="required"/><br>
                        
                        <input type='submit' value='update!' />
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