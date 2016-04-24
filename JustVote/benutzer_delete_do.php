<?php include("inc/session_check.php"); ?>
<?php require_once("Mapper/benutzer.php");?>
<?php require_once("Mapper/benutzer_manager.php");?>

<?php
$id = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

$benutzer_manager = new benutzer_manager();
$benutzer = $benutzer_manager->findById($id);
$benutzer_manager->delete($benutzer);

header('Location: benutzer_read.php');
?>