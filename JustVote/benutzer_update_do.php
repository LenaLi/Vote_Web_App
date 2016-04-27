<?php
require_once("Mapper/benutzer_manager.php");
require_once("Mapper/benutzer.php");

//POST Parameter werden ausgelesen
$id = (int)$_POST["id"];
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname = htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");

//falls...
if (!empty($vorname) && !empty($nachname) && !empty($email)) {
    //Datenbankverbindung aufbauen
    $benutzer_manager = new benutzer_manager();
    //Methode findById
    $benutzer = $benutzer_manager->findById($id);
    $benutzer->vorname = $vorname;
    $benutzer->nachname = $nachname;
    $benutzer->email =$email;
    $benutzer_manager->update($benutzer);
    //Weiterleitung zu benutzer_read.php
    header('Location: benutzer_read.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>