<?php include("inc/session_check.php"); ?>

<?php

    $_SESSION["login"]="0";
    session_destroy();

    //Weiterleitung zur Login-In Seite
    header('Location: index.php');
?>

