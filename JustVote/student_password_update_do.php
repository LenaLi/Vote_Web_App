<?php
require_once("Mapper/student_manager.php");
require_once("Mapper/student.php");

//POST Parameter auslesen
$id = htmlspecialchars((int)$_POST["id"], ENT_QUOTES, "UTF-8");
$password1 = htmlspecialchars($_POST["password1"], ENT_QUOTES, "UTF-8");
$password2 = htmlspecialchars($_POST["password2"], ENT_QUOTES, "UTF-8");

// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($password1) && !empty($password2)) {

    if ($password1 == $password2) {
        // Objekt von student_manager erzeugen, welcher Datenbankverbindung besitzt
        $student_manager = new student_manager();

        // lese Student mit Student-ID aus Datenbank und speichere Informationen in einem Student-Objekt
        $student = $student_manager->findById($id);

        // aktualisiere Attribute das Passwort des Student-Objektes
        $student->password =$password1;

        // Änderungen des Passwortes in Datenbank aktualisieren
        $student_manager->updatePassword($student);

        // Weiterleitung auf die Übersichtsseite des Studenten
        header('Location: student_uebersicht.php');
    }
    else {
        echo "Passwörter stimmen nicht überein!";
    }

} else {
    header('Location: student_password_update_form.php?error=1');
}
?>