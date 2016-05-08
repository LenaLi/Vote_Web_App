<?php 
include("inc/session_check.php");
require_once("Mapper/benutzer.php");
require_once("Mapper/benutzer_manager.php");

// POST Parameter auslesen
$vorname=htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname=htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$email=htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$role=htmlspecialchars($_POST["role"], ENT_QUOTES, "UTF-8");


// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($vorname) && !empty($nachname) && !empty($email)&& !empty($role)) {
    
    // Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
    $manager=new benutzer_manager();

    // neuen Benutzer erzeugen mit den POST Parametern
    $manager->create($vorname,$nachname,$email,$role);

    // Weiterleitung auf die Übersichtsseite der Benutzer
    header('Location: benutzer_read.php');

} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>