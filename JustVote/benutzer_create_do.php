<?php include("inc/session_check.php");

require_once("Mapper/user.php");
require_once("Mapper/benutzer_manager.php");

?>

<?php

//POST Parameter (name, email,)
$name=$_POST["name"];
$email=$_POST["email"];
$role=$_POST["role"];
//Datenbankverbindung aufbauen

$manager=new benutzer_manager();
$manager->create($name,$email,$role);



//neuen Benutzer aus den POST Parametern in Datenbank speichern
// --> DAFÜR SIND IM ORDNER MAPPER IN DER DATEI benutzer_manager.php dann METHODEN ANGELEGT!


//Weiterleitung auf benutzer_read oder Fehlermeldung (keine Dopplungen, keine Berechtigungen)
header('Location: benutzer_read.php');
?>