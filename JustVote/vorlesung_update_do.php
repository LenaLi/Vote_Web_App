<?php require_once("Mapper/vorlesung_manager.php");?>
<?php require_once("Mapper/vorlesung.php");?>

<?php
$vorlesungsid = (int)$_POST["vorlesungsid"];
$vorlesungsname = htmlspecialchars($_POST["vorlesungsname"], ENT_QUOTES, "UTF-8");


if (!empty($vorlesungsid) && !empty($vorlesungsname)) {
    $vorlesung_manager = new vorlesung_manager();
    $vorlesung_manager->update($vorlesungsid, $vorlesungsname);
    header('Location: uebersicht.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>