<?php
include("inc/session_check.php");
require_once("Mapper/benutzer.php");
require_once("Mapper/benutzer_manager.php");

// POST Parameter auslesen
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname = htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$role = htmlspecialchars($_POST["role"], ENT_QUOTES, "UTF-8");


// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($vorname) && !empty($nachname) && !empty($email) && !empty($role)) {

    // Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
    $manager = new benutzer_manager();

    // neuen Benutzer erzeugen mit den POST Parametern
    $success = $manager->create($vorname, $nachname, $email, $role);

    // Weiterleitung auf die Übersichtsseite der Benutzer, wenn Eingabe erfolgreich (Benutzer darf nur einmal existieren)
    if ($success == true) {
        header('Location: benutzer_read.php?success=1');
    } else {
        header('Location: benutzer_create_form.php?error=2');
    }
} else {
    header('Location: benutzer_create_form.php?error=1');
}
?>