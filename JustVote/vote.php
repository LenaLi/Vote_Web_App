<!-- Hier kommt Link + QR Code zum jeweiligen Voting hinein -->

<?php include("inc/session_check.php"); ?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<body>

<?php include("inc/navbar_vote.php"); ?>

<div id="wrapper">


    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Ihre Vorlesungen und Votings</h1>
                    <p></p>
                    <?php
                    // DB Abfrage zu Vorlesungen von Benutzer.....
                    require_once("Mapper/vorlesung.php");
                    require_once("Mapper/vorlesung_manager.php");
                    require_once("Mapper/voting_manager.php");
                    //DB Abfrage zu Votings

                    $votingmanager =new voting_manager();
                    $votings = $votingmanager->findByVotingId($_SESSION['votingid']);
                    $votingmanager =new voting_manager();
                    $aktuellesvoting=$_GET['id'];

                    while ($aktuellesvoting=$votings)
                        foreach($votings as $voting){
                            echo "<table class='table table-hover'>";
                            // Frage und Antwortmöglichkeiten
                            echo "<thead><tr>";
                            echo "<th colspan='12'>" . $voting->frage ;
                            echo "<th>" . $voting->antwort_1 ;
                            echo "<th>" . $voting->antwort_2 ;
                            echo "<th>" . $voting->antwort_3 ;
                            echo "<th>" . $voting->antwort_4 ;


                            echo  "<th>";
                            echo "</tr> </thead>";

                            $votings=$votingmanager->findByVorlesungsId($vorlesung->vorlesungsid);

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






