<?php include("inc/session_check.php"); ?>
<?php include("inc/header.php")?>
<?php include("inc/navigation.php")?>
<?php require_once("Mapper/result_manager.php"); ?>

<?php

$ergebnis=$_POST ["voting"];
$voting_id=$_SESSION ["voting_id"];

$manager=new result_manager();
$manager->inputresult($voting_id, $ergebnis);
?>

<!-- TODO function beziehungvotingstudent noch anlegen wenn das mit dem einloggen von Studenten geklärt ist! -->

<?php
// TODO: muss mit der DB verbunden werden damit richtige Antwort angezeigt wird
$result = antwort_1;

// switch-case anweisung als bessere Variante zur elseif anweisung
switch ($result) {
    case antwort_1:
        $ausgabe = "Antwort 1";
        break;

    case antwort_2:
        $ausgabe = "Antwort 2";
        break;
    case antwort_3:
        $ausgabe = "Antwort 3";
        break;

    case antwort_4:
        $ausgabe = "Antwort 4";
        break;
}

echo 'Du hast ' . $ausgabe . ' angeklickt'

?>


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