<!-- Ausf�hrung der Abstimmung -->

<?php
require_once("inc/session_student.php");
require_once("Mapper/auswertung_manager.php");
require_once("Mapper/voting_student_manager.php");
require_once("Mapper/student_manager.php");

// POST Parameter auslesen
$postantwort = htmlspecialchars($_POST["rb_antworten"], ENT_QUOTES, "UTF-8");
$postvoting = htmlspecialchars($_POST["votingid"], ENT_QUOTES, "UTF-8");
$postfrage = htmlspecialchars($_POST["frageid"], ENT_QUOTES, "UTF-8");
$kuerzel = htmlspecialchars($_POST["kuerzel"], ENT_QUOTES, "UTF-8");

// Prüfen ob alle Formularfelder ausgefüllt wurden
if (!empty ($postantwort) && !empty ($postvoting) && !empty ($postfrage) && !empty ($kuerzel)) {

    // Objekt von student_manager erzeugen, welcher Datenbankverbindung besitzt
    $student_manager = new student_manager();

    // Mit Kuerzel und @hdm-stuttgart.de wird E-Mail Adresse erstellt
    $email = $kuerzel . "@hdm-stuttgart.de";

    //Student mit E-Mail Adresse aus Datenbank auslesen
    $student = $student_manager->findByEmail($email);

    // Pruefen, ob der Student nicht existiert
    if ($student == null) {
        //Student mit E-Mail Adresse in Datenbank anlegen
        $student_manager->create(null, null, $email, null);
        // eben erstellen Student mit Email-Adresse auslesen
        $student = $student_manager->findByEmail($email);
    }

    // Objekt von student_manager erzeugen, welcher Datenbankverbindung besitzt
    $voting_student_manager = new voting_student_manager();


    $status = $voting_student_manager->create($postvoting, $student->student_id);

    if ($status == null) {
        // Eintrag in DB schon vorhanden
        header('Location: vote_student_ergebnis.php?id=' . $postvoting . '&error=1');
        die();
    }

    //Objekt von Auswertung wird erzeugt
    $auswertungsmanager = new auswertung_manager();
    $auswertungsmanager->create($postfrage, $postantwort, $postvoting);

    echo "voting " . $postvoting;
    echo "<br /> student " . $student->student_id;

    $votings = $voting_student_manager->findVotingsByStudent($student->student_id);

    $votingIds = array();
    foreach ($votings as $voting) {
        array_push($votingIds, $voting->votingid);
    }

    //header redirect
    header('Location: vote_student_ergebnis.php?id=' . $postvoting);
} else {
    header('Location: vote_student_form.php?id=' . $postvoting . "&error=1");
}
?>