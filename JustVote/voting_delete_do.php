<?php include("inc/session_check.php"); ?>
<?php require_once("Mapper/voting.php"); ?>
<?php require_once("Mapper/voting_manager.php"); ?>

<?php
$votingid = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

$voting_manager = new voting_manager();
$voting_manager->delete($votingid);

header('Location: uebersicht.php');
?>

