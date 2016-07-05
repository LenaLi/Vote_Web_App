<?php
require_once("Mapper/student.php");
require_once("Mapper/student_manager.php");
?>

<?php
// POST Parameter auslesen
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname = htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$kuerzel = htmlspecialchars($_POST["kuerzel"], ENT_QUOTES, "UTF-8");
$password1 = htmlspecialchars($_POST["password1"], ENT_QUOTES, "UTF-8");
$password2 = htmlspecialchars($_POST["password2"], ENT_QUOTES, "UTF-8");


// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($vorname) && !empty($nachname) && !empty($kuerzel) && !empty($password1) && !empty($password2)) {

    // Objekt von student_manager erzeugen, welcher Datenbankverbindung besitzt
    $manager = new student_manager();

    //Überprüfung ob Kürzel kein @ Zeichen enthält (da bereits vorgegeben)
    if (strstr($kuerzel, "@") != false) {
        header('Location: student_register_form.php?error=3');
        die();
    }

    // Zusammenfügen von Kürzel des Studenten und @hdm-stuttgart.de
    $email = $kuerzel . "@hdm-stuttgart.de";

    //Überprüfung ob die beiden Passwörter übereinstimmen
    if ($password1 == $password2) {
        // Student mit der E-Mail aus Datenbank auslesen
        $student = $manager->findByEmail($email);
        // Wenn der Student noch nicht registriert ist
        if ($student != null) {
            //Wenn Student schon registriert ist, kann er sich kein zweites mal registrieren
            if ($student->password != null) {
                header('Location: student_register_form.php?error=4');
                die();
            }
            $student->vorname = $vorname;
            $student->nachname = $nachname;

            // zufälligen Salt generieren (Salt= Zufallswert der das erraten des Passwort-Hashes erschweren soll)
            $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
            $options = [
                'salt' => $salt
            ];
            // Passwort wird mit salt gehasht
            $student->password = password_hash($password1, PASSWORD_BCRYPT, $options);

            //Update des Studenten
            $manager->update($student);
        } else {
            // neuen Student erzeugen mit den POST Parametern
            $manager->create($vorname, $nachname, $email, $password1);
        }
        // Weiterleitung zum Login der Studenten
        header('Location: student_login_form.php');


    } else {
        //Fehlermeldung: Passwort stimmt nicht überein
        header('Location: student_register_form.php?error=1');
    }

} else {
    //Fehlermeldung: Bitte alle Felder ausfüllen
    header('Location: student_register_form.php?error=2');
}
?>