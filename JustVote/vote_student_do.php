<!-- Datensätze in DB einfügen -->

<?php include("inc/session_check.php"); ?>
<?php include("inc/header.php")?>
<?php include("inc/navigation.php")?>
<?php require_once("Mapper/result_manager.php");?>


<?php

// POST Parameter auslesen
$ergebnis=htmlspecialchars($_POST["voting"], ENT_QUOTES, "UTF-8");
$voting_id=htmlspecialchars($_POST["votingid"], ENT_QUOTES, "UTF-8");

//$ergebnis=$_POST ["voting"];
//$voting_id=$_SESSION ["voting_id"];

// Objekt von result_manager erzeugen, welcher Datenbankverbindung besitzt
$manager=new result_manager();

// neues Ergebnis erzeugen mit den POST Parametern
$manager->inputresult($votingid, $ergebnis);
?>

<!-- TODO function beziehungvotingstudent noch anlegen wenn das mit dem einloggen von Studenten geklärt ist! -->

<?php

// TODO: muss mit der DB verbunden werden damit richtige Antwort angezeigt wird
// POST Parameter auslesen
$result = htmlspecialchars($_POST["result"], ENT_QUOTES, "UTF-8");

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