<?php
//header('Content-Type: image/png');

/*
require_once ('src/QrCode.php');
use Endroid\QrCode\QrCode;
$qr = new QrCode();

$qr->setText('http://www.google.de');
$qr->setSize (200);
$qr->setPadding(10);
$qr->render();*/




use Endroid\QrCode\QrCode;

$qrCode = new QrCode();
$qrCode
    ->setText('Life is too short to be generating QR codes')
    ->setSize(300)
    ->setPadding(10)
    ->setErrorCorrection('high')
    ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
    ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
    ->setLabel('Scan the code')
    ->setLabelFontSize(16)
    ->setImageType(QrCode::IMAGE_TYPE_PNG)
;

// now we can directly output the qrcode
header('Content-Type: '.$qrCode->getContentType());
$qrCode->render();
?>