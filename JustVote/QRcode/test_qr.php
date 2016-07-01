<?php
/**
 * Created by PhpStorm.
 * User: Renate
 * Date: 01.07.2016
 * Time: 20:25
 */

include ("QRcode/phpqrcode.php");

// outputs image directly into browser, as PNG stream
QRcode::png('PHP QR Code :)');