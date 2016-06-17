<?php
require_once("Mapper/student.php");
require_once("Mapper/student_manager.php");
require_once("Mapper/voting_student.php");
require_once("Mapper/voting_student_manager.php");
?>

<?php

// POST Parameter auslesen
$email=htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$password=htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
$votingid=htmlspecialchars($_POST["votingid"], ENT_QUOTES, "UTF-8");

// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($email)&& !empty($password)) {

    // Objekt von student_manager erzeugen, welcher Datenbankverbindung besitzt
    $manager=new student_manager();
    

// Lese Benutzer mit email aus Datenbank und speichere Informationen in einem Benutzer-Objekt
    $student=$manager->findByEmail($email);

// Überprüfen, ob das vom Benutzer eingegebene Passwort mit dem aus der Datenbank übereinstimmt
    $password_correct=password_verify($password,$student->password);


    // überprüfen ob Passwort und E-Mail(Benutzername) korrekt sind
    if ($password_correct && $student->email==$email) {

        //Passwort und Email korrekt
        session_start();
        // Speichere Logged in Information in Session
        $_SESSION['studentlogin'] = "1";
        $_SESSION ['name'] = $student->vorname." ".$student->nachname; //damit bei Herzlich Willkommen - Max Müller steht!
        $_SESSION ['studentid'] =$student->student_id;

        $votingStudentManager=new voting_student_manager();
        if (!empty($votingid)){
            //Weiterleitung Link votingID
            header('Location: vote_student_form.php?id='.$votingid);
        }else {
            // Weiterleitung auf die Übersichtsseite der Studenten
            header('Location: student_uebersicht.php');
        }

    } else {
    header('Location: student_login_form.php?error=1');
    }
}
?>