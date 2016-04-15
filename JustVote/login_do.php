<?php include("inc/header.php"); ?>

<?php
    // Datenbankabfrage und Passwortprüfung
/*
    // TODO: Durch Werte aus Datenbank ersetzen
    $datenbankpassword = "123";
    $datenbankuser = "admin";

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
*/


require_once("Mapper/benutzer_manager.php");
require_once("Mapper/benutzer.php");

$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($password)) {
    $benutzer_manager = new benutzer_manager();
    $benutzer = $benutzer_manager->findByLogin($login, $password);
    if ($benutzer==null) {
        header('Location: uebersicht.php');
        die();
    } else {
        session_start();
        $_SESSION ['benutzer'] = $benutzer;
        $_SESSION ['login'] = "1";
        header('Location: index.php?error=1');
        die();
    }
} else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";
}

?>