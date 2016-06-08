<?php
require_once("Mapper/student.php");
require_once("Mapper/student_manager.php");
?>

<?php

// POST Parameter auslesen
$vorname=htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname=htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$email=htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$password1=htmlspecialchars($_POST["password1"], ENT_QUOTES, "UTF-8");
$password2=htmlspecialchars($_POST["password2"], ENT_QUOTES, "UTF-8");


// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($vorname)&& !empty($nachname)&&!empty($email)&& !empty($password1)&& !empty($password2)) {

    // Objekt von student_manager erzeugen, welcher Datenbankverbindung besitzt
    $manager=new student_manager();

    //Überprüfung die beiden Passwörter übereinstimmen
    

    if ($password1==$password2){

        // neuen Student erzeugen mit den POST Parametern
        $manager->create($vorname,$nachname,$email,$password1);

        // Weiterleitung auf die Übersichtsseite der Studenten
        header('Location: student_login_form.php');


    } else {
        header('Location: student_register_form.php?error=1');
    }
    
    
} else {
    header('Location: student_register_form.php?error=2');
}
?>