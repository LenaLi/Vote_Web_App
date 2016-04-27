<?php
require_once("Mapper/benutzer_manager.php");
require_once("Mapper/benutzer.php");

//POST Parameter auslesen
$id = (int)$_POST["id"];
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname = htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");

//falls...
if (!empty($vorname) && !empty($nachname) && !empty($email)) {

    // Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
    $benutzer_manager = new benutzer_manager();

    //Methode findById
    $benutzer = $benutzer_manager->findById($id);
    $benutzer->vorname = $vorname;
    $benutzer->nachname = $nachname;
    $benutzer->email =$email;
    $benutzer_manager->update($benutzer);

    //Weiterleitung auf benutzer_read
    header('Location: benutzer_read.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>