<?php include("inc/session_check.php"); ?>

<?php 

//POST Parameter (Benutzername, Name,)

//Datenbankverbindung aufbauen

//neuen Benutzer aus den POST Parametern in Datenbank speichern


//Weiterleitung auf benutzer_read oder Fehlermeldung (keine Dopplungen, keine Berechtigungen)
header('Location: benutzer_read.php');
?>