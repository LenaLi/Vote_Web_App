<?php include("inc/session_check.php");

require_once("Mapper/student.php");
require_once("Mapper/student_manager.php");

?>

<?php

//POST Parameter (vorname, nachname, email,)
$vorname=$_POST["vorname"];
$nachname=$_POST["nachname"];
$email=$_POST["email"];
$role=$_POST["role"];
//Datenbankverbindung aufbauen

$manager=new student_manager();

$manager->create($vorname,$nachname,$email,$role);


//Weiterleitung auf benutzer_read oder Fehlermeldung (keine Dopplungen, keine Berechtigungen)
header('Location: student_read.php');


$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname = htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
$password2 = htmlspecialchars($_POST["password2"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($vorname) && !empty($nachname) && !empty($password) && !empty($password2)) {
$nutzerdaten = [
"email" => $email,
"vorname" => $vorname,
"nachname" => $nachname,
"hash" => password_hash($password, PASSWORD_DEFAULT)
];
$student = new student_manager();
$student_manager = new student_manager();
$student_manager->create($vorname,$nachname,$email,$role);
header('Location: uebersicht.php');
} else {
echo "Error: Bitte alle Felder ausfüllen!<br/>";
}

?>