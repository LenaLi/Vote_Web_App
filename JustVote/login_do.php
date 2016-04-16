<?php
include("inc/header.php");
require_once("Mapper/benutzer.php");
require_once("Mapper/benutzer_manager.php");

// Datenbankabfrage und Passwortprüfung

// POST Parameter auslesen, die Nutzer eingegeben hat
$email=$_POST["email"];
$password=$_POST["password"];
$manager=new benutzer_manager();
$benutzer=$manager->findByEmail($email);

if ($benutzer->password==$password && $benutzer->email==$email) {
    //Passwort und Benutzername korrekt
    session_start();
    // Speichere Logged in Information in Session
    $_SESSION["login"] = "1";
    $_SESSION ['name'] = $benutzer->vorname." ".$benutzer->nachname; //damit bei Herzlich Willkommen - Max Müller steht!
    $_SESSION ['role'] =$benutzer->role;
    // Weiterleitung zur Übersichtsseite
    header ('Location: uebersicht.php');
} else {
    // Passwort oder Benutzername falsch
    // Weiterleitung zur Statseite mit Login Dialog
    header('Location: index.php?error=1');
}
?>