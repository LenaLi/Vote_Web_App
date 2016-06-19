<?php

//Überprüfung, ob der Student bereits eingeloggt ist
if($_SESSION["studentlogin"]<>"1"){
    // falls der Student noch nicht eingeloggt ist -> Weiterleitung auf Startseite
    header('Location: student_login_form.php');
    die();
}
?>