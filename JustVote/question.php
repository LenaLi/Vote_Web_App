
<!-- TO DO Datenbankabfrage: Voting und Antwortmöglichkeiten -->
<!DOCTYPE html>
<html>

<?php include("inc/session_check.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/navbar_vote.php"); ?>


<!-- Datenbankabfrage Voting -->


<!DOCTYPE html>
<html>


<body>



<div id="wrapper">


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

                            $votings=$votingmanager->findByVotingId($votings->$votingid);

                            foreach($votings as $voting){
                                echo "<tr>";
                                echo "<th>" . $voting->votingname . "</th>";


                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>






