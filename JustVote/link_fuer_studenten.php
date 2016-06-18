<?php
include("inc/session_check.php");
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

                    //echo "<button onclick='window.clipboard.setData()'\"https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/vote_student_form.php?id=".$aktuellesvoting."\";'>Link kopieren</button>";
                    ?>
                <h5>Klicke auf den Link oder scanne den QR-Code ein, um am Voting teilzunehmen</h5>

</div>
        <?php

            require_once ('src/QrCode.php');
            use Endroid\QrCode\QrCode;
            $qr = new QrCode();

            $qr->setText("https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/vote_student_form.php?id=".$aktuellesvoting);
            $qr->setSize (200);
            $qr->setPadding(10);
            $qr->render();

        ?>

</body>
</html>

<!--
// TODO QR Code https://developers.google.com/chart/infographics/docs/qr_codes#syntax

/*
<a href="http://code.google.com/apis/chart/infographics/docs/qr_codes.html">Google Chart Tools: QR Codes</a>
<a href="http://code.google.com/p/zxing/">Google ZXing</a>
<a href="http://zxing.appspot.com/generator/">Google ZXing QR Code Generator</a>
*/


//So muss der Link Aussehen
// http://chart.apis.google.com/chart?chs=500x500&cht=qr&chld=L&chl=https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/$aktuellesvoing



<!-- ALT QR CODE (vielleicht brauch man das – wenn nicht löschen!

//first include the library from your local path
include('../qrlib.php');

// then to output the image directly as PNG stream do for example:
QRcode::png('your texte here...');
// to save the result locally as a PNG image:

$tempDir = EXAMPLE_TMP_SERVERPATH;

$codeContents = 'your message here...';

$fileName = 'qrcode_name.png';

$pngAbsoluteFilePath = $tempDir.$fileName;
$urlRelativeFilePath = EXAMPLE_TMP_URLRELPATH.$fileName;

QRcode::png($codeContents, $pngAbsoluteFilePath);
*/

