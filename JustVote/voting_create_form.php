
<?php include("inc/session_check.php"); ?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<body>

<?php include("inc/navbar_loggedin.php"); ?>
<?php
require_once ("Mapper/vorlesung.php");
require_once ("Mapper/vorlesung_manager.php");

$vorlesungsmanager = new vorlesung_manager();
$benutzerid=$_SESSION["benutzerid"];
$vorlesungen=$vorlesungsmanager->findByBenutzerID($benutzerid); ///???????????


?>
<div id="wrapper">

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h2>Neues Voting</h2>

                    <form class="form-horizontal" role="form" action="voting_create_do.php" method="post">

                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" name="votingid" id="votingid">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="votingname" id="votingname" placeholder="Name des Votings">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                        <select class="c-select" name="vorlesungsid">
                            <?php
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
                            <div class="col-sm-6"
                            <label for="startdatum">Startzeit</label>
                            <input type="date" name="startdatum">
                            <input type="time" name="startzeit">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6"
                            <label for="enddatum">Endzeit</label>
                            <input type="date" name="enddatum">
                            <input type="time" name="endzeit">
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

</div>

</body>
</html>







































