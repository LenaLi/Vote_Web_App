<?php include("inc/session_check.php");?>
<?php require_once("Mapper/benutzer.php");?>
<?php require_once("Mapper/benutzer_manager.php");?>

<?php

//POST Parameter (vorname, nachname, email, role)
$vorname=$_POST["vorname"];
$nachname=$_POST["nachname"];
$email=$_POST["email"];
$role=$_POST["role"];

//Datenbankverbindung aufbauen
$manager=new benutzer_manager();

$manager->create($vorname,$nachname,$email,$role);


//Weiterleitung auf benutzer_read oder Fehlermeldung (keine Dopplungen, keine Berechtigungen)
header('Location: benutzer_read.php');
?>