<?php
include("inc/session_check.php");
include("inc/header.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort_manager.php");
require_once("Mapper/auswertung_manager.php");
?>


<!DOCTYPE html>
<html>

<!-- Klasse Login-Body richtet alles mittig aus -->
<body class="mitte">
<!-- LOGO -->
<div class="mitte">
    <img src="http://mars.iuk.hdm-stuttgart.de/~ll033/pics/Logo_JustVote.svg" href="http://mars.iuk.hdm-stuttgart.de/~cm102/uebersicht.php"/>
</div>


<?php
//holt die zur votingid dazugehoerige Frage aus der DB-Abfrage
$fragemanager =new frage_manager();
$votingid = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");
$votings = $fragemanager->getFragebyVotingid ($votingid);
?>

<h1>
<?php
echo $votings ["text"]."</br>";
?>
</h1>

<?php
//holt die zur frageID dazugehoerigen antworten aus der DB-Abfrage
$antwortmanager =new antwort_manager();
$frageid = $votings ["ID"];
$antworten = $antwortmanager->getAllbyFrageID($frageid);


$VOTINGID = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");
$votingmanager =new frage_manager();
//$_SESSION["votingid"] = $VOTINGID;*/
$votings = $votingmanager->getFragebyVotingid($_SESSION["votingid"]);


// wenn key 1 dann hat er schon abgestimmt, daher ausgabe des if blocks
$key = in_array ($VOTINGID, $_SESSION["votingid"]);
if ($key==1) {


    // --------------- Für Anzahl Teilnehmer ---------------------------------
    // Objekt von result_manager erzeugen, welcher Datenbankverbindung besitzt
    $auswertungsmanager =new auswertung_manager();
    // lese Teilnehmeranzahl mit voting-ID aus Datenbank aus
    $gesamtanzahlTeilnemer = $auswertungsmanager->countTeilnehmer($votingid);

print_r ($gesamtanzahlTeilnemer);
    foreach ($gesamtanzahlTeilnemer as $eintrag) {
        $zahlDerTeilnehmer = $eintrag->Anzahl;
    }

    echo '<div id="ergebnis" style="width: 500px;">';


    // --------------- Für Anzahl pro Antwort ---------------------------------

    // einmal jede antwort durchlaufen damit ein balken generiert wird, zu jewelige antwort die zahl reinschreiben
    echo '<div class="col-md-6">';

    echo "<br/>";
    foreach ($antworten as $eintraege) {

            $countAntwortInstanz = new auswertung_manager();
            $auswertung = $countAntwortInstanz->countAntwort($eintraege["ID"]);

echo $auswertung->Anzahl;
        echo "<br/>";
        echo $zahlDerTeilnehmer;
        echo "<br/>";

            $resultinpercent = round(($auswertung->Anzahl)/$zahlDerTeilnehmer*100,2);
        echo $resultinpercent;

            // $eintrag ["text"] . $auswertung . "</br>";
            //print_r($auswertung);
            echo '
            <div class="progress">
                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
                    aria-valuenow="' . $resultinpercent . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $resultinpercent . '%">
                    <span class="sr-only">' . $resultinpercent . '</span>
                    </div>
            </div>';

        }
        echo "</div>";


        // ---------------  Details --------------------


        echo '<h3> Teilnehmeranzahl: ' . '</h3>';
}
else {
    echo "else teil der schleife";
    echo '<form action="vote_student_do.php" method="post">';


//alle antworten ausgeben
    foreach ($antworten as $eintrag) {
        echo "<input type='radio' name='rb_antworten' value='" . $eintrag ["ID"] . "'/>" . $eintrag ["text"] . "</br>";
    }
    //hiddenfields um die felder zu übertragen
    echo '<input type="hidden" value="' . $votingid . '" name="votingid">';
    echo '<input type="hidden" value="' . $frageid . '" name="frageid">';

    //abschicken-button - ende des forms
    echo '<input type="submit" class="btn btn-warning" name="Abschicken" value="Abschicken">';
    echo '</form>';
}
?>
</body>
    <!------------------------- ENDE ------------------------------

    <?php

/*<!DOCTYPE html>
 <html>
 <body>
 <div class="container-fluid">

     <div class="row">
         <div class="col-lg-12">
             <form action="vote_student_do.php" method="post">
                 <table>
                     debug1

                     <?php

                     //sessionvariable mit anzahl der antwortmöglichkeiten
                     $_SESSION ["anzahlantworten"]=2;


                     if($votings==null)
                     {
                         //kein Datensatz gefunden
                         echo '<h2>Kein Datensatz wurde gefunden</h2>';
                     }

                     // Durchgehen der Datensätze
                     // der Session wird der Wert des angeklickten Datensatz zugewiesen
                     // votings ist der große container, foreach-schleife macht neue variable voting in der schleife ruft man aktuelles ergebnis ab
                     foreach($votings as $voting)
                     {

                         $_SESSION["A1"] = $voting->antwort_1;
                         $_SESSION["A2"] = $voting->antwort_2;
                         $_SESSION["A3"] = $voting->antwort_3;
                         $_SESSION["A4"] = $voting->antwort_4;
                     }

                     ?>
                     <tr>
                         <td>
                             <?php
                             echo '<h2>' . $votings->frage . '</h2>';
                             ?>
                         </td>
                     </tr>


                     <tr>
                         <td>
                             <?php
                             echo '<input type="radio" name="rb_voting" value="antwort_1"/>' . $_SESSION["A1"];
                             ?>
                         </td>
                     </tr>

                     <tr>
                         <td>
                             <?php
                             echo '<input type="radio" name="rb_voting" value="antwort_2"/>' . $_SESSION["A2"];
                             ?>
                         </td>
                     </tr>

                     <?php
                     if ($_SESSION["A3"] != '') {
                         echo '<tr>
                                     <td>';
                         echo '<input type="radio" name="rb_voting" value="antwort_3"/>' . $_SESSION["A3"];
                         echo '</td>
                                 </tr>';
                         $_SESSION ["anzahlantworten"]++;
                     }
                     if ($_SESSION["A4"] != '') {
                         echo '<tr>
                                     <td>';
                         echo '<input type="radio" name="rb_voting" value="antwort_4"/>' . $_SESSION["A4"];
                         echo '</td>
                                 </tr>';
                         $_SESSION ["anzahlantworten"]++;
                     }
                     ?>

                     <tr>
                         <td>
                             <input type="submit" name="Abschicken" value="Abschicken">
                         </td>
                     </tr>
                 </table>
             </form>

         </div>
     </div>
 </div>

 </div>

 };
 ?>
 </body>
 </html>




<?php
/*
$VOTINGID = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");
$votingmanager =new voting_manager();
$_SESSION["votingid"] = $VOTINGID;
$votings = $votingmanager->findByVotingId($_SESSION["votingid"]);

print_r($_SESSION);


$key = in_array ($VOTINGID, $_SESSION["voting"]);
if ($key==1) {

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

}
else {


print_r($key);

?>


<!DOCTYPE html>
<html>
<body>
<div class="container-fluid">

 <div class="row">
     <div class="col-lg-12">
         <form action="vote_student_do.php" method="post">
             <table>
                 debug1

                 <?php

                 //sessionvariable mit anzahl der antwortmöglichkeiten
                 $_SESSION ["anzahlantworten"]=2;


                 if($votings==null)
                 {
                     //kein Datensatz gefunden
                     echo '<h2>Kein Datensatz wurde gefunden</h2>';
                 }

                 // Durchgehen der Datensätze
                 // der Session wird der Wert des angeklickten Datensatz zugewiesen
                 // votings ist der große container, foreach-schleife macht neue variable voting in der schleife ruft man aktuelles ergebnis ab
                 foreach($votings as $voting)
                 {

                     $_SESSION["A1"] = $voting->antwort_1;
                     $_SESSION["A2"] = $voting->antwort_2;
                     $_SESSION["A3"] = $voting->antwort_3;
                     $_SESSION["A4"] = $voting->antwort_4;
                 }

                 ?>
                 <tr>
                     <td>
                         <?php
                         echo '<h2>' . $votings->frage . '</h2>';
                         ?>
                     </td>
                 </tr>


                 <tr>
                     <td>
                         <?php
                         echo '<input type="radio" name="rb_voting" value="antwort_1"/>' . $_SESSION["A1"];
                         ?>
                     </td>
                 </tr>

                 <tr>
                     <td>
                         <?php
                         echo '<input type="radio" name="rb_voting" value="antwort_2"/>' . $_SESSION["A2"];
                         ?>
                     </td>
                 </tr>

                 <?php
                 if ($_SESSION["A3"] != '') {
                     echo '<tr>
                                     <td>';
                     echo '<input type="radio" name="rb_voting" value="antwort_3"/>' . $_SESSION["A3"];
                     echo '</td>
                                 </tr>';
                     $_SESSION ["anzahlantworten"]++;
                 }
                 if ($_SESSION["A4"] != '') {
                     echo '<tr>
                                     <td>';
                     echo '<input type="radio" name="rb_voting" value="antwort_4"/>' . $_SESSION["A4"];
                     echo '</td>
                                 </tr>';
                     $_SESSION ["anzahlantworten"]++;
                 }
                 ?>

                 <tr>
                     <td>
                         <input type="submit" name="Abschicken" value="Abschicken">
                     </td>
                 </tr>
             </table>
         </form>

     </div>
 </div>
</div>

</div>

<?php //else block schließen
};
?>
</body>
</html>     */