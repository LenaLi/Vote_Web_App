<?php include("inc/header.php");
include("Mapper/benutzer_manager.php");
include("Mapper/user.php");
?>



<?php
require_once("Mapper/UserManager.php");
require_once("Mapper/User.php");

$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($password)) {
    $userManager = new UserManager();
    $user = $userManager->findByLogin($login, $password);
    if ($user==null) {
        header('Location: login.php');
        die();
    } else {
        session_start();
        $_SESSION ['user'] = $user;
        $_SESSION ['login'] = "1";
        header('Location: index.php');
        die();
    }
} else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";
}








<?php


    // Datenbankabfrage und Passwortprüfung

    // TODO: Durch Werte aus Datenbank ersetzen
    $datenbankpassword = $hash;
    $datenbankuser = $login;

    // POST Parameter auslesen, die Nutzer eingegeben hat
    $benutzer=$_POST["benutzer"];
    $password=$_POST["password"];

    if ($datenbankpassword==$password && $datenbankuser==$user) {
        //Passwort und Benutzername korrekt
        session_start();
        // Speichere Logged in Information in Session
        $_SESSION["login"] = "1";
        $_SESSION ['benutzer'] = $benutzer;
        // Weiterleitung zur Übersichtsseite
        header ('Location: uebersicht.php');
    } else {
        // Passwort oder Benutzername falsch
        // Weiterleitung zur Statseite mit Login Dialog
        header('Location: index.php?error=1');
     }
?>

