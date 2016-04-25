<?php include ("inc/session_check.php");?>
<?php include ("inc/header.php");?>
<?php include ("inc/navigation.php");?>

<?php

$dsn = "mysql:dbhost=mars.iuk.hdm-stuttgart.de;dbname=u-rs095";
$dbuser = "rs095";
$dbpass = "mae5zie6Ai";

$link=mysql_connect($dsn, $dbuser, $dbpass);

// or die ('Verbindungsversuch fehlgeschlagen: '.mysql.error($linkerror));

//$sqlstring='SELECT COUNT(ergebnis) AS anzahl FROM ergebnis

$sqlstring='SELECT * FROM ergebnis';
$result=mysql_querry($sqlstring);

while ($line=mysql_fetch_array($result, mysql_both))

{

    echo $line["ergebnis"];
}
?>


