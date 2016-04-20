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
                    <h1>Hier soll Voting Name stehen </h1>
                    <p></p>
                    <?php
                    // DB Abfrage zu Vorlesungen von Benutzer.........
                    require_once("Mapper/vorlesung.php");
                    require_once("Mapper/vorlesung_manager.php");
                    require_once("Mapper/voting_manager.php");
                    require_once("Mapper/voting.php");


                    //DB Abfrage zu Votings TO DO --MUSS FERTIG GEMACHT WERDEN UND AUCH IN EINE MAPPER KLASSE?


                    $aktuellesvoting=$_GET['id'];

                    $sql =  ( "SELECT * FROM voting WHERE id =" . $aktuellesvoting);


                    echo $frage['frage']." "."<br />";
                    echo $antwort_1['antwort_1']." "."<br />";
                    echo $antwort_2['antwort_2']." "."<br />";
                    echo $antwort_3['antwort_3']." "."<br />";
                    echo $antwort_4['antwort_4']." "."<br />";


                    ?>

                    // Bisherige Stimmen aus der Datenbank holen


                    ?>



                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>






