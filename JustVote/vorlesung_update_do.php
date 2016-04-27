<?php
require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/vorlesung.php");

//POST Parameter auslesen
$vorlesungsid = (int)htmlspecialchars($_POST["vorlesungsid"],ENT_QUOTES, "UTF-8");
$vorlesungsname = htmlspecialchars($_POST["vorlesungsname"], ENT_QUOTES, "UTF-8");

// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($vorlesungsid) && !empty($vorlesungsname)) {

    // Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
    $vorlesung_manager = new vorlesung_manager();

    // Änderungen in Datenbank aktualisieren
    $vorlesung_manager->update($vorlesungsid, $vorlesungsname);
    
    // Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
    header('Location: uebersicht.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>