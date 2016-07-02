<?php
include("inc/session_check.php");
include("phpqrcode/qrlib.php");
require_once("Mapper/voting_manager.php");
require_once("Mapper/voting.php");
?>


<?php include("inc/header.php"); ?>

<!DOCTYPE html>
<html>
<body class="mitte">
<!-- LOGO -->
<div class="mitte">
    <img src="http://mars.iuk.hdm-stuttgart.de/~ll033/pics/Logo_JustVote.svg" />
</div>
<div>
                    <?php
                    // ID wird ausgelesen und an URL drangehängt
                    $aktuellesvoting=$_GET['id'];

                    // Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
                    $voting_manager = new voting_manager();

                    // lese Voting aus Datenbank mit der Funktion findByVotingID
                    $voting=$voting_manager->findByVotingId($aktuellesvoting);
                    ?>

                    <h1> Name der Umfrage:  </h1>

                    <?php
                    //Ausgeben des Votingnamen zur zugehörigen ID
                    echo "<h1>".$voting->votingname."</h1>";
                    ?>

                    <br>

                    <?php
                    // Ausgeben des Links mit der jeweiligen ID
                    echo ' <a href= https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/vote_student_form.php?id='.$aktuellesvoting.">https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/vote_student_form.php?id='.$aktuellesvoting</a>";

                    ?>
                <h5>Klicke auf den Link oder scanne den QR-Code ein, um am Voting teilzunehmen</h5>

                <?php
                // generierter QR Code wird mit entspechender ID eingefügt
                echo '<img src="link_fuer_studenten_qrcode.php?id='.$aktuellesvoting.'" />';
                ?>


    </div>



</body>
</html>

