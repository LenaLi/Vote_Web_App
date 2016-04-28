<?php
require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/vorlesung.php");

//POST Parameter auslesen
$vorlesungsId = (int)htmlspecialchars($_POST["vorlesungsid"],ENT_QUOTES, "UTF-8");
$vorlesungsName = htmlspecialchars($_POST["vorlesungsname"], ENT_QUOTES, "UTF-8");

// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($vorlesungsId) && !empty($vorlesungsName)) {

    // Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
    $vorlesung_manager = new vorlesung_manager();

    // Änderungen in Datenbank aktualisieren
    $vorlesung_manager->update($vorlesungsId, $vorlesungsName);
    
    // Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
    header('Location: uebersicht.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>