<?php 
require_once("Mapper/benutzer.php");
require_once("Mapper/benutzer_manager.php");

// POST Parameter auslesen, die Nutzer eingegeben hat
$email=htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$password=htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

// Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
$manager=new benutzer_manager();

// Lese Benutzer mit email aus Datenbank und speichere Informationen in einem Benutzer-Objekt
$benutzer=$manager->findByEmail($email);

// Überprüfen, ob das vom Benutzer eingegebene Passwort mit dem aus der Datenbank übereinstimmt
$password_correct=password_verify($password,$benutzer->password);

// überprüfen ob Passwort und E-Mail(Benutzername) korrekt sind
if ($password_correct && $benutzer->email==$email) {
    
    //Passwort und Email (Benutzername) korrekt
    session_start();
    // Speichere Logged in Information in Session
    $_SESSION['login'] = "1";
    $_SESSION ['name'] = $benutzer->vorname." ".$benutzer->nachname; //damit bei Herzlich Willkommen - Max Müller steht!
    $_SESSION ['role'] =$benutzer->role;
    $_SESSION ['benutzerid'] =$benutzer->id;
    
    // Weiterleitung zur Übersichtsseite
    header ('Location: uebersicht.php');
} else {
    // Weiterleitung zur Statseite mit Login Dialog (falls, Passwort oder Benutzername falsch)
    header('Location: index.php?error=1');
}
?>