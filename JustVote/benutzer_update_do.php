<?php
require_once("Mapper/benutzer_manager.php");
require_once("Mapper/benutzer.php");

//POST Parameter auslesen
$id = (int)$_POST["id"];
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname = htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");

// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($vorname) && !empty($nachname) && !empty($email)) {

    // Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
    $benutzer_manager = new benutzer_manager();

    // lese Benutzer mit Benutzer-ID aus Datenbank und speichere Informationen in einem Benutzer-Objekt
    $benutzer = $benutzer_manager->findById($id);

    // aktualisiere Attribute des Benutzer-Objektes
    $benutzer->vorname = $vorname;
    $benutzer->nachname = $nachname;
    $benutzer->email =$email;

    // Änderungen in Datenbank aktualisieren
    $benutzer_manager->update($benutzer);

    // Weiterleitung auf die Übersichtsseite der Benutzer
    header('Location: benutzer_read.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>