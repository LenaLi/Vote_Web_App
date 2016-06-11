<?php include("inc/session_check_student.php"); ?>

<?php

$_SESSION["studentlogin"]="0";
session_destroy();

//Weiterleitung zur Login-In Seite
header('Location: student_login_form.php');
?>

