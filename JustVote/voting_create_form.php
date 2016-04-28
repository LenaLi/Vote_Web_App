<?php
include("inc/session_check.php");
require_once ("Mapper/vorlesung.php");
require_once ("Mapper/vorlesung_manager.php");
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

                    <h2>Neues Voting</h2>

                    <form class="form-horizontal" role="form" action="voting_create_do.php" method="post">
                        

                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="votingname" id="votingname" placeholder="Name des Votings">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                            <label>Vorlesung auswählen: </label>
                            </div>

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



                        <div class="form-group">
                            <div class="col-sm-6"
                            <label for="frage"></label>
                            <textarea class="form-control" name="frage" rows="3" placeholder="Frage"></textarea>
                            </div>
                        </div>


                         <div class="form-group">
                             <div class="col-sm-6"
                             <label for="antwort_1"></label>
                             <textarea class="form-control" name="antwort_1" rows="2" placeholder="Antwortmöglichkeit 1"></textarea>
                            </div>
                         </div>

                        <div class="form-group">
                            <div class="col-sm-6"
                            <label for="antwort_2"</label>
                            <textarea class="form-control" name="antwort_2" rows="2" placeholder="Antwortmöglichkeit 2"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6"
                            <label for="antwort_3"</label>
                            <textarea class="form-control" name="antwort_3" rows="2" placeholder="Antwortmöglichkeit 3"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                             <div class="col-sm-6"
                            <label for="antwort_4"</label>
                            <textarea class="form-control" name="antwort_4" rows="2" placeholder="Antwortmöglichkeit 4"></textarea>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-3"
                            <label for="startdatum"></label>
                            <input class="form-control" type="date" name="startdatum" placeholder="Startdatum">
                            <input class="form-control" type="time" name="startzeit" placeholder="Startzeit">
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3"
                            <label for="enddatum"></label>
                            <input class="form-control" type="date" name="enddatum" placeholder="Enddatum">
                            <input class="form-control" type="time" name="endzeit" placeholder="Endzeit">
                        </div>

                            </div>
                            <div class="form-group">
                            <div class=" col-sm-6">
                                <button type="submit" class="btn btn-warning">Erstellen</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

</div>

</body>
</html>







































