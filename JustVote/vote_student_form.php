<!-- Abstimmungsformular -->

<?php
include("inc/session_student.php");
include("inc/header.php");
require_once("Mapper/frage_manager.php");
require_once("Mapper/antwort_manager.php");
require_once("Mapper/auswertung_manager.php");
require_once("Mapper/voting.php");
require_once("Mapper/voting_manager.php");

echo '<body class="mitte">
<div class="mitte">
   <img src="http://mars.iuk.hdm-stuttgart.de/~ll033/pics/Logo_JustVote.svg"/>
</div>';

// Fehlermeldung, wenn keine Antwortmöglichkeit ausgewählt wurde
if ($_GET["error"] == "1") {
    echo "<div class='alert alert-danger' role='alert'>";
    echo "Bitte wähle eine Antwort aus";
    echo "</div";
}

// Objekt von frage_manager erzeugen, welcher Datenbankverbindung besitzt
$fragemanager = new frage_manager();

// Voting-ID aus GET Parameter auslesen
$votingid = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

// Lese Fragen mit Votingid aus der Datenbank aus
$fragen = $fragemanager->getFragebyVotingid($votingid);

// Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
$voting_manager = new voting_manager();

// Lese Voting mit der Votingid aus der Datenbank aus
$voting = $voting_manager->findByVotingId($votingid);


//Verhindert Manupulation nachdem Voting beendet ist
if (time() >= strtotime($voting->enddatum)) {
    header('Location: student_login_form.php');
    die();
}
?>

<h1>
    <?php
    echo $fragen ["text"] . "</br>";
    ?>
</h1>
<br>
<?php
$antwortmanager = new antwort_manager();
$frageid = $fragen ["ID"];
$antworten = $antwortmanager->getAllbyFrageID($frageid);

// Abstimmungsformular wird erzeugt
echo '<form action="vote_student_do.php" method="post">';
// Antworten zur werden anhand ihrer ID zur entsprechenden Frage ausgelesen
foreach ($antworten as $eintrag) {
    //
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
}
//Versteckte Felder zur Übertragung der Daten
echo '<input type="hidden" value="' . $votingid . '" name="votingid">';
echo '<input type="hidden" value="' . $frageid . '" name="frageid">';
echo "<div class='input-group'>";
echo $_SESSION["kuerzel"];
echo '<input type="text" class="form-control"  placeholder="Kürzel" aria-describedby="basic-addon2" name ="kuerzel" value="' . $_SESSION["kuerzel"] . '"required="required"/>';
echo '<span class="input-group-addon" id="basic-addon2">@hdm-stuttgart.de</span>';
echo "</div>";
echo "</br>";
// Abschicken des Formulars
echo '<input type="submit" class="btn btn-warning" name="Abschicken" value="Abschicken">';
echo '</form>';
?>
