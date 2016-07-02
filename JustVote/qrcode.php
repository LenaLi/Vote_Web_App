<?php
//header('Content-Type: image/png');

require_once ('src/QrCode.php');
use Endroid\QrCode\QrCode;
$qr = new QrCode();

$qr->setText('http://www.google.de');
$qr->setSize (200);
$qr->setPadding(10);
$qr->render();

?>