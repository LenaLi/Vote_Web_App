<?php

require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/vorlesung.php");

$vorlesungsid = (int)$_POST["vorlesungsid"];
$benutzerid = htmlspecialchars($_POST["benutzerid"], ENT_QUOTES, "UTF-8");
$vorlesungsname = htmlspecialchars($_POST["vorlesungsname"], ENT_QUOTES, "UTF-8");


if (!empty($vorlesungsid) && !empty($benutzerid) && !empty($vorlesungsname)) {
    $vorlesung_manager = new vorlesung_manager();
    $vorlesung = $vorlesung_manager->findByVorlesungsId($vorlesungsid);
    $vorlesung->vorlesungsid = $vorlesungsid;
    $vorlesung->benutzerid = $benutzerid;
    $vorlesung->vorlesungsname =$vorlesungsname;
    $vorlesung_manager->update($vorlesung);
    header('Location: uebersicht.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}

