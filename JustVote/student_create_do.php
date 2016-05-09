<?php include("inc/session_check.php");

require_once("Mapper/student.php");
require_once("Mapper/student_manager.php");

?>

<?php

//POST Parameter auslesen (vorname, nachname, email,)
$vorname=$_POST["vorname"];
$nachname=$_POST["nachname"];
$email=$_POST["email"];
$role=htmlspecialchars($_POST["role"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
$password2 = htmlspecialchars($_POST["password2"], ENT_QUOTES, "UTF-8");


// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty($vorname) && !empty($nachname) && !empty($email)&& !empty($password)&& !empty($password2)) {

    // Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
    $manager=new student_manager();

    // neuen Benutzer erzeugen mit den POST Parametern
    $manager->create($vorname,$nachname,$email,$role);

    // Weiterleitung auf die Übersichtsseite der Benutzer
    header('Location: benutzer_read.php');

} else {
    header('Location: index.php');
}
?>









<!--

$manager=new student_manager();

$manager->create($vorname,$nachname,$email,$password);


if (!empty($vorname) && !empty($nachname) && !empty($email) && !empty($password) && !empty($password2)) {
$nutzerdaten = [
"email" => $email,
"vorname" => $vorname,
"nachname" => $nachname,
"hash" => password_hash($password, PASSWORD_DEFAULT)
];
$student = new student_manager();
$student_manager = new student_manager();
$student_manager->create($vorname,$nachname,$email,$role);
header('Location: vote_student_form.php');
} else {
echo "Error: Bitte alle Felder ausfüllen!<br/>";
}

?>