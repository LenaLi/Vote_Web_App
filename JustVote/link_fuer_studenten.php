<?php
include("inc/session_check.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/voting_manager.php");
require_once("Mapper/voting.php");
?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<body>

<?php include("inc/navbar_vote.php"); ?>

<div id="page-wrapper">


        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Hier soll Voting Name stehen </h1>
                    <p></p>
                    <?php



                    //DB Abfrage zu Votings TO DO --MUSS FERTIG GEMACHT WERDEN UND AUCH IN EINE MAPPER KLASSE?


                    // Hier soll Votingname stehen

                    $votingname=$_GET['votingname'];
                    echo $votingname;

                    echo $votingname['votingname']." "."<br />";
                    $aktuellesvoting=$_GET['id'];
                    echo 'https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/

     // HIER KOMMT NUR DER LINK UND QR-CODE
                    ?>





                </div>
            </div>
        </div>
</div>


</body>
</html>






