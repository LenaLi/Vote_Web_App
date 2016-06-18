<?php
header('Content-Type: image/png');

require_once ('src/QrCode.php');
use Endroid\QrCode\QrCode;
$qr = new QrCode();

$qr->setText();
$qr->setSize (200);
$qr->setPadding(10);
$qr->render();

?>