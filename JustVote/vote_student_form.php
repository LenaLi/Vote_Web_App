<?php
include("inc/session_check.php");
include("inc/header.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort_manager.php");
require_once("Mapper/auswertung_manager.php");
include("inc/navigation_mitte.php");
?>

<!DOCTYPE html>
<html>

<?php
//holt die zur votingid dazugehoerige Frage aus der DB-Abfrage
$fragemanager =new frage_manager();
$votingid = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");
$votings = $fragemanager->getFragebyVotingid ($votingid);
?>

<h1>
<?php
echo  $votings ["text"]."</br>";
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

    $key = array();
//if abfrage ob array befüllt ist

if array ==1
$key = in_array ($VOTINGID, $_SESSION["votingid"]);

if ($key==1) {
    header('Location:vote_student_ergebnis.php?id='.$votingid);}

else {
    echo '<form action="vote_student_do.php" method="post">';


//alle antworten ausgeben
    foreach ($antworten as $eintrag) {

        if (!empty ($eintrag["text"])) {
            echo "<div class='input-group'>";
            echo "<span class='input-group-addon'>";
            echo "<input type='radio' name='rb_antworten' value='" . $eintrag ["ID"] . "'/>" . $eintrag [""] . "</br>";
            echo "</span>";
            echo "<span class='form-control' aria-label='...' > " . $eintrag ["text"] . "";
            echo "</span>";
            echo "</div>";
            echo "</br>";
        }

      //echo "<input type='checkbox' name='rb_antworten' value='" . $eintrag ["ID"] . "'/>" . $eintrag ["text"] . "</br>";
    }
    //hiddenfields um die felder zu übertragen
    echo '<input type="hidden" value="' . $votingid . '" name="votingid">';
    echo '<input type="hidden" value="' . $frageid . '" name="frageid">';

    //abschicken-button - ende des forms
    echo '<input type="submit" class="btn btn-warning" name="Abschicken" value="Abschicken">';
    echo '</form>';
}
?>
