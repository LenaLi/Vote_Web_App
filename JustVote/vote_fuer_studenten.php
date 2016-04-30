
<!-- TODO Abstimm seite für studenten

<?php include("inc/session_check.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/navbar_vote.php"); ?>

<!-- TODO Datenbankabfrage: Voting und Antwortmöglichkeiten-->
<!DOCTYPE html>
<html>

<!-- Datenbankabfrage Voting -->


<!DOCTYPE html>
<html>


<body>



<div id="page-wrapper">


    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Voting Hier steht Votingname </h1>
                    <p></p>

                    <?php
                    // DB Abfrage zu Vorlesungen von Benutzer.....
                    require_once("Mapper/voting_manager.php");
                    require_once("Mapper/voting.php");
                    //DB Abfrage zu Votings

                    // $votings = $votingmanager->findByBenutzerId($_SESSION['benutzerid']);

                    $votingmanager =new voting_manager();

                    if($votings!=null)
                        foreach($votings as $voting){
                            echo "<table class='table table-hover'>";

                            $votings=$votingmanager->findByVotingId($votings->$votingId);

                            foreach($votings as $voting){
                                echo "<tr>";
                                echo "<th>" . $voting->votingname . "</th>";


                                echo "</tr>";
                            }
                /*
                    $aktuellesvoting=$_GET['id'];

                    $sql =  ( "SELECT * FROM voting WHERE id =" . $aktuellesvoting);


                    echo $frage['frage']." "."<br />";
                    echo $antwort_1['antwort_1']." "."<br />";
                    echo $antwort_2['antwort_2']." "."<br />";
                    echo $antwort_3['antwort_3']." "."<br />";
                    echo $antwort_4['antwort_4']." "."<br />";

*/
                    ?>

                     <?       echo "</table>";
                        }
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>


