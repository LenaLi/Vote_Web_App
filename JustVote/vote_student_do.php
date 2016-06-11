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
