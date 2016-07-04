<?php
include("inc/session_check.php");
require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/vorlesung.php");

//POST Parameter auslesen
$vorlesungsId = (int)htmlspecialchars($_POST["vorlesungsid"], ENT_QUOTES, "UTF-8");
$vorlesungsName = htmlspecialchars($_POST["vorlesungsname"], ENT_QUOTES, "UTF-8");
$vorlesungsNummer = htmlspecialchars($_POST["vorlesungsnummer"], ENT_QUOTES, "UTF-8");

// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($vorlesungsId) && !empty($vorlesungsNummer) && !empty($vorlesungsName)) {

    // Objekt von vorlesung_manager erzeugen, welcher Datenbankverbindung besitzt
    $vorlesung_manager = new vorlesung_manager();

    //Lese Vorlesung mit der Vorlesungsid aus vorlesung_manager aus
    $vorlesung = $vorlesung_manager->findByVorlesungsId($vorlesungsId);

// Wenn Vorlesung nicht zu Benutzer gehört, dann wird der Zugriff verweigert
    if ($vorlesung->benutzerid != $_SESSION["benutzerid"]) {
        //header('Location: uebersicht.php');
        die();
    }
    // Änderungen in Datenbank aktualisieren
    $vorlesung_manager->update($vorlesungsId, $vorlesungsName, $vorlesungsNummer);

    // Weiterleitung auf die Übersichtsseite der Vorlesungen und Votings
    header('Location: uebersicht.php');
} else {
    header('Location: vorlesung_update_form.php?error=1');
}
?>