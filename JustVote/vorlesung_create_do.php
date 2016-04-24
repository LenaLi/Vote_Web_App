<?php include("inc/session_check.php");?>

<?php require_once("Mapper/vorlesung.php");?>
<?php require_once("Mapper/vorlesung_manager.php");?>

<?php
//POST Parameter (vorlesungsid, benutzerid, vorlesungsname,)
$vorlesungsid=$_POST["vorlesungsid"];
$benutzerid=$_SESSION["benutzerid"];
$vorlesungsname=$_POST["vorlesungsname"];
//Datenbankverbindung aufbauen

$manager=new vorlesung_manager();

$manager->create($vorlesungsid,$benutzerid,$vorlesungsname);


//neuen Benutzer aus den POST Parametern in Datenbank speichern


//Weiterleitung auf uebersicht.php oder Fehlermeldung (keine Dopplungen, keine Berechtigungen)
header('Location: uebersicht.php');
?>