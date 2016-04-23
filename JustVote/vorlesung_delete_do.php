<?php include("inc/session_check.php"); ?>

<?php
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");

$vorlesungsid = (int)htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");

$vorlesung_manager = new vorlesung_manager();
$vorlesung_manager->delete($vorlesungsid);

header('Location: uebersicht.php');
