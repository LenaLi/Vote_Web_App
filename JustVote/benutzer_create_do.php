<?php include("inc/session_check.php");

require_once("Mapper/user.php");
require_once("Mapper/benutzer_manager.php");

?>

<?php

//POST Parameter (Benutzername, Name,)

//Datenbankverbindung aufbauen

//neuen Benutzer aus den POST Parametern in Datenbank speichern
// --> DAFÜR SIND IM ORDNER MAPPER IN DER DATEI benutzer_manager.php dann METHODEN ANGELEGT!!!!!!!!!!---


//Weiterleitung auf benutzer_read oder Fehlermeldung (keine Dopplungen, keine Berechtigungen)
header('Location: benutzer_read.php');
?>