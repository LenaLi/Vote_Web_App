<?php include("inc/session_check.php"); ?>
<?php include("inc/session_check_admin.php"); ?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php");
require_once("Mapper/voting_manager.php");
require_once("Mapper/voting.php");
?>
<?php

$votingid = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");
$voting_manager = new voting_manager();
$voting = $voting_manager->findByVotingId($votingid);

echo $votingid;
?>

<body>

<?php include("inc/navbar_loggedin.php"); ?>

<div id="wrapper">

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h1>Vorlesung bearbeiten</h1>

                    <form action='voting_update_do.php' method='post'>
                        <input type='hidden' name='votingid' value='<?php echo $voting->votingid ?>' /
                        <br>
                        <input type='hidden' name='vorlesungsid' value='<?php echo $voting->vorlesungsid ?>' /
                        <br>
                        Votingname:<br>
                        <input type='text' name='votingname' value='<?php echo $voting->votingname ?>' /><br>
                        Frage:<br>
                        <input type='text' name='frage' value='<?php echo $voting->frage ?>' /><br>
                        Antwortmöglichkeit 1:<br>
                        <input type='text' name='antwort_1' value='<?php echo $voting->antwort_1 ?>' /><br>
                        Antwortmöglichkeit 2:<br>
                        <input type='text' name='antwort_2' value='<?php echo $voting->antwort_2 ?>' /><br>
                        Antwortmöglichkeit 3:<br>
                        <input type='text' name='antwort_3' value='<?php echo $voting->antwort_3 ?>' /><br>
                        Antwortmöglichkeit 4:<br>
                        <input type='text' name='antwort_4' value='<?php echo $voting->antwort_4 ?>' /><br>
                        Startdatum:<br>
                        <input type='text' name='startdatum' value='<?php echo $voting->startdatum ?>' /><br>
                        Enddatum:<br>
                        <input type='text' name='enddatum' value='<?php echo $voting->enddatum ?>' /><br>
                        
                        <input type='submit' value='update!' />
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
</body>
</html>