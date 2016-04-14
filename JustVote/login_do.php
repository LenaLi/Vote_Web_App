<?php include("inc/header.php"); ?>

<?php
    // Datenbankabfrage und Passwortprüfung

    // TODO: Durch Werte aus Datenbank ersetzen
    $datenbankpassword = "123";
    $datenbankuser = "admin";

    // POST Parameter auslesen, die Nutzer eingegeben hat
    $user=$_POST["user"];
    $password=$_POST["password"];

    if ($datenbankpassword==$password && $datenbankuser==$user) {
        //Passwort und Benutzername korrekt
        session_start();
        // Speichere Logged in Information in Session
        $_SESSION["login"] = "1";
        $_SESSION ['user'] = $user;
        // Weiterleitung zur Übersichtsseite
        header ('Location: uebersicht.php');
    } else {
        // Passwort oder Benutzername falsch
        // Weiterleitung zur Statseite mit Login Dialog
        header('Location: index.php?error=1');
     }
?>
