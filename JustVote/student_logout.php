<?php include("inc/session_student.php"); ?>

<?php
    // session check
    if($_SESSION["studentlogin"]!="1"){
    header('Location: student_login_form.php');
    die();
    }

    $_SESSION["studentlogin"]="0";
    session_destroy();

    //Weiterleitung zur Login-In Seite
    header('Location: student_login_form.php');
?>

