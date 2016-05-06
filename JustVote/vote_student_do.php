<!-- Datensätze in DB einfügen -->

<?php include("inc/session_check.php"); ?>
<?php include("inc/header.php")?>
<?php include("inc/navigation.php")?>
<?php require_once("Mapper/result_manager.php");?>


<?php

// POST Parameter auslesen
$ergebnis=htmlspecialchars($_POST["rb_voting"], ENT_QUOTES, "UTF-8");
$votingid=$_SESSION["votingid"];

// Objekt von result_manager erzeugen, welcher Datenbankverbindung besitzt
$manager=new result_manager();

// neues Ergebnis erzeugen mit den POST Parametern
$manager->inputresult($votingid, $ergebnis);
?>

<!-- TODO function beziehungvotingstudent noch anlegen wenn das mit dem einloggen von Studenten geklärt ist! -->

<?php

// switch-case anweisung als bessere Variante zur elseif anweisung
// es wird auf die globale variable SESSION aufgerufen, man hätte auch ne neue DB Abfrage machen können, aber wenns in ner globalen Variable ist, ist das unnötig
switch ($ergebnis) {
    case antwort_1:
         $ausgabe = "Antwort 1: ''".$_SESSION["A1"]."''";
        break;

    case antwort_2:
        $ausgabe = "Antwort 2: ''".$_SESSION["A2"]."''";
        break;
    case antwort_3:
        $ausgabe = "Antwort 3: ''".$_SESSION["A3"]."''";
        break;

    case antwort_4:
        $ausgabe = "Antwort 4: ''".$_SESSION["A4"]."''";
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