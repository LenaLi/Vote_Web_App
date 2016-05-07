<?php
require_once("Mapper/benutzer_manager.php");
require_once("Mapper/benutzer.php");

//POST Parameter auslesen
$id = htmlspecialchars((int)$_POST["id"], ENT_QUOTES, "UTF-8");
$password1 = htmlspecialchars($_POST["password1"], ENT_QUOTES, "UTF-8");
$password2 = htmlspecialchars($_POST["password2"], ENT_QUOTES, "UTF-8");

// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($password1) && !empty($password2)) {

    if ($password1 == $password2) {
        // Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
        $benutzer_manager = new benutzer_manager();

        // lese Benutzer mit Benutzer-ID aus Datenbank und speichere Informationen in einem Benutzer-Objekt
        $benutzer = $benutzer_manager->findById($id);

        
        // aktualisiere Attribute das Passwort des Benutzer-Objektes
        $benutzer->password =$password1;

        // Änderungen des Passwortes in Datenbank aktualisieren
        $benutzer_manager->updatePassword($benutzer);

        // Weiterleitung auf die Übersichtsseite der Benutzer
        header('Location: benutzer_read.php');
    }
    else {
        echo "Passwörter stimmen nicht überein!";
    }

} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>