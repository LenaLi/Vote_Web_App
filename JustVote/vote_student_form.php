<?php
include("inc/session_student.php");
//include("inc/session_check.php");
include("inc/header.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort_manager.php");
require_once("Mapper/auswertung_manager.php");
require_once("Mapper/voting.php");
require_once("Mapper/voting_manager.php");
include("inc/navigation_mitte.php");

// Objekt von frage_manager erzeugen, welcher Datenbankverbindung besitzt
$fragemanager =new frage_manager();

// Voting-ID aus GET Parameter auslesen
$votingid = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

$fragen = $fragemanager->getFragebyVotingid ($votingid);

$voting_manager=new voting_manager();

$voting=$voting_manager->findByVotingId($votingid);

//Verhindert Manupulation nachdem Voting beendet ist
if (time()>=strtotime($voting->enddatum)) {

    header('Location: student_login_form.php');
    die();
}
?>

<h1>
<?php
echo  $fragen ["text"]."</br>";
?>
</h1>

<?php

//$votingmanager =new frage_manager();



//verwirrrend geschrieben!!!!
//$votings = $votingmanager->getFragebyVotingid($_SESSION["votingid"]);

$antwortmanager =new antwort_manager();

//verwirrrend geschrieben!!!!
$frageid = $fragen ["ID"];
$antworten = $antwortmanager->getAllbyFrageID($frageid);





// Prüfung ob Student schon für Votings abgestimmt hat --> ÜBER DATENBANK!!!!!!!!!!
/*if ($_SESSION["votingIds"] != null){
    // wenn key 1 dann hat er schon für dieses Voting abgestimmt, daher ausgabe des if blocks
    $key = in_array ($VOTINGID, $_SESSION["votingIds"]);
    if ($key==1) {
        header('Location:vote_student_ergebnis.php?id='.$votingid);
    }
}
else {*/

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

echo "<div class='input-group'>";
echo $_SESSION["kuerzel"];
echo '<input type="text" class="form-control"  placeholder="Kürzel" aria-describedby="basic-addon2" name ="email" value="'.$_SESSION["kuerzel"].'"required="required"/>';
echo '<span class="input-group-addon" id="basic-addon2">@hdm-stuttgart.de</span>';
 echo "</div>";
echo "</br>";




//abschicken-button - ende des forms
echo '<input type="submit" class="btn btn-warning" name="Abschicken" value="Abschicken">';

echo '</form>';
//}
?>
<!-- <a href="vote_student_ergebnis.php?id=<?php echo $votingid?>">Ergebnisse ansehen</a>