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
                    // DB Abfrage zum Voting
                    require_once("Mapper/voting_manager.php");

                    $vorlesungen = $votingmanager->findByVotingId($_SESSION['votingid']);

                    $votingmanager =new voting_manager(); ?>



                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>






