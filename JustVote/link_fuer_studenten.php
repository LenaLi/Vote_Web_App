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

                    <?php


                    //DB Abfrage zu Votings TO DO --MUSS FERTIG GEMACHT WERDEN UND AUCH IN EINE MAPPER KLASSE?


                    $votingname=$_GET['votingname'];
                    echo $votingname;

                    echo $votingname['votingname']." "."<br />";
                    $aktuellesvoting=$_GET['id'];
                    echo 'https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/'.$aktuellesvoting;


                    // TODO QR Code https://developers.google.com/chart/infographics/docs/qr_codes#syntax

                    /*
                    <a href="http://code.google.com/apis/chart/infographics/docs/qr_codes.html">Google Chart Tools: QR Codes</a>
                    <a href="http://code.google.com/p/zxing/">Google ZXing</a>
                    <a href="http://zxing.appspot.com/generator/">Google ZXing QR Code Generator</a>
                    */


                    //So muss der Link Aussehen
                   // http://chart.apis.google.com/chart?chs=500x500&cht=qr&chld=L&chl=https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/$aktuellesvoing




                    ?>

                </div>
            </div>
        </div>
</div>


</body>
</html>




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

