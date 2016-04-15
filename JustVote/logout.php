<?php include("inc/session_check.php"); ?>

<?php
    $_SESSION["login"]="0";
    session_destroy();
    header('Location: index.php');
?>