<?php include("inc/session_check.php"); ?>
<?php require_once("vote_student_form.php"); ?>
<?php require_once("Mapper/voting_manager.php"); ?>

<?php

$ergebnis=$_POST ["voting"];
$voting_id=$_SESSION ["voting_id"];

$manager=new voting_manager();
$manager->inputresult($voting_id, $ergebnis);
?>

<!-- TODO function beziehungvotingstudent noch anlegen wenn das mit dem einloggen von Studenten gekl�rt ist! -->

<!DOCTYPE html>
<html>
<body>
<h1>Danke f&uuml;rs Abstimmen!</h1>
<form action="ergebnis.php" method="post">
<input type="submit" name="Zu den Ergebnissen" value="Zu den Ergebnissen"/>

</body>

</html>