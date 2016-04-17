<?php include("inc/session_check.php"); ?>

<?php
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");

$vorlesungsid = (int)htmlspecialchars($_GET["vorlesungsid"], ENT_QUOTES, "UTF-8");

$vorlesung_manager = new vorlesung_manager();
$vorlesung = $vorlesung_manager->findByVorlesungsId($vorlesungsid);
$vorlesung_manager->delete($vorlesung);

header('Location: uebersicht.php');
