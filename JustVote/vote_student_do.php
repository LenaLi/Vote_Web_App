<?php include("inc/session_check.php"); ?>
<?php include("inc/header.php")?>
<?php include("inc/navigation.php")?>
<?php require_once("Mapper/voting_manager.php"); ?>

<?php

$ergebnis=$_POST ["voting"];
$voting_id=$_SESSION ["voting_id"];

$manager=new voting_manager();
$manager->inputresult($voting_id, $ergebnis);
?>

<!-- TODO function beziehungvotingstudent noch anlegen wenn das mit dem einloggen von Studenten geklärt ist! -->

<!DOCTYPE html>
<html>
<body>
    <div>
        <h1>Danke f&uuml;rs Abstimmen!</h1>
        <form action="ergebnis.php" method="post">
        <input type="submit" name="Zu den Ergebnissen" value="Zu den Ergebnissen"/>
    </div>
</body>

</html>