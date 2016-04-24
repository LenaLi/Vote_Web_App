<?php include("inc/session_check.php");?>
<?php require_once ("Mapper/voting.php");?>
<?php require_once ("Mapper/voting_manager.php");?>

<?php
$votingid=$_GET["id"];

$voting_manager=new voting_manager();
$voting=$voting_manager->findByVotingId($votingid);

$voting_manager->update($voting->votingid,$voting->vorlesungsid, $voting->votingname, $voting->frage, $voting->antwort_1, $voting->antwort_2 ,$voting->antwort_3, $voting->antwort_4, $voting->startdatum, date("y-m-d H:i:s",time()));

header('Location: uebersicht.php');
?>