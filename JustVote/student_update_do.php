<?php

require_once("Mapper/student_manager.php");
require_once("Mapper/student.php");

$id = (int)$_POST["id"]; // statt id student_id?? -->
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname = htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");

if (!empty($vorname) && !empty($nachname) && !empty($email)) {
    $student_manager = new student_manager();
    $student = $student_manager->findById($id);
    $student->vorname = $vorname;
    $student->nachname = $nachname;
    $student->email =$email;
    $student_manager->update($student);
    header('Location: student_read.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}

