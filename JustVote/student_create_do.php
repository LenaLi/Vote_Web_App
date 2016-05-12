<?php include("inc/session_check.php");

require_once("Mapper/student.php");
require_once("Mapper/student_manager.php");

?>

<?php

//POST Parameter (vorname, nachname, email,)
$vorname=$_POST["vorname"];
$nachname=$_POST["nachname"];
$email=$_POST["email"];
$password=$_POST["password"];
$role=$_POST["role"];
//Datenbankverbindung aufbauen

$manager=new student_manager();

$manager->create($vorname,$nachname,$email,$password,$role);


//Weiterleitung auf benutzer_read oder Fehlermeldung (keine Dopplungen, keine Berechtigungen)
header('Location: student_uebersicht.php');
?>