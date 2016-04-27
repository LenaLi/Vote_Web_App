<?php include ("inc/session_check.php");?>
<?php include ("inc/header.php");?>
<?php include ("inc/navigation.php");?>

<?php

require_once("Mapper/result_manager.php");

$ergebnismanager =new result_manager();
$_SESSION["voting_id"] =7;
$results = $ergebnismanager->findByErgebnis($_SESSION["voting_id"], "antwort_1");

if($results==null)
{
    //kein Datensatz gefunden
    echo '<h2>Kein Datensatz wurde gefunden</h2>';
}

//Schleife hier eigentlich nicht nötig, da id eindeutig und nur ein Datensatz zurückgegeben wird
foreach($results as $result)
{
    echo $result->anzahl;

}

?>


