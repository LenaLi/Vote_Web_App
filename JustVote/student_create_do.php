<?php include("inc/session_check.php");

require_once("Mapper/student.php");
require_once("Mapper/student_manager.php");

?>

<?php

//POST Parameter (vorname, nachname, email,)
$vorname=$_POST["vorname"];
$nachname=$_POST["nachname"];
$email=$_POST["email"];
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
$password2 = htmlspecialchars($_POST["password2"], ENT_QUOTES, "UTF-8");
// $role=$_POST["role"];

//Datenbankverbindung aufbauen

$manager=new student_manager();

$manager->create($vorname,$nachname,$email,$password,$password2);


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