<!-- Datensätze in DB einfügen -->

<?php require_once("inc/session_check.php"); ?>
<?php require_once("Mapper/auswertung_manager.php");


//die benötigten IDs werden mittels post hergeholt
$postantwort=htmlspecialchars($_POST["rb_antworten"], ENT_QUOTES, "UTF-8");
$postvoting=htmlspecialchars($_POST["votingid"], ENT_QUOTES, "UTF-8");
$postfrage=htmlspecialchars($_POST["frageid"], ENT_QUOTES, "UTF-8");

$_SESSION["votingid"] = array ($postvoting);


//neue auswertung wird erstellt, dh ergebnis in tabelle geschrieben
$auswertungsmanager =new auswertung_manager();
$auswertungsmanager ->create($postfrage, $postantwort, $postvoting);


//header redirect
header('Location: vote_student_form.php?id=' . $postvoting);



/*
// POST Parameter auslesen
$ergebnis=htmlspecialchars($_POST["rb_antworten"], ENT_QUOTES, "UTF-8");
$votingid=$_SESSION["votingid"];

// Objekt von result_manager erzeugen, welcher Datenbankverbindung besitzt
$manager=new result_manager();

// neues Ergebnis erzeugen mit den POST Parametern
$manager->inputresult($votingid, $ergebnis);

//speichert ob ich schon am den ding teilgenommen habe, weil ich an mehreren teilnehmen kann und jedes mal schreib ich id in arry wenn form aufrufen muss ich abfragen einbrauen ob id schon mal irgendwo steht wenn schon mal teilgenommen dann ergebnissen angezeigt, leeres array das befüllt wird mit 0 bis x werten
//speichert in session in welcher voiting id ich teilngenommen hab
$_SESSION["voting"][]=$votingid;

//header redirect--------------------------------------------------------
header('Location: vote_student_form.php?id=' . $votingid . '&' . $antwortID);

$antwortID
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
*/