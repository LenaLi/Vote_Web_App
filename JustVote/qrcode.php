<?php
header('Content-Type: image/png');

require_once ('src/QrCode.php');
use Endroid\QrCode\QrCode;
$qr = new QrCode();

$qr->setText("https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/vote_student_form.php?id=".$aktuellesvoting);
$qr->setSize (200);
$qr->setPadding(10);
$qr->render();

?>