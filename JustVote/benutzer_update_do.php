<?php require_once("Mapper/benutzer_manager.php");?>
<?php require_once("Mapper/benutzer.php");?>

<?php
$id = (int)$_POST["id"];
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname = htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");

if (!empty($vorname) && !empty($nachname) && !empty($email)) {
    $benutzer_manager = new benutzer_manager();
    $benutzer = $benutzer_manager->findById($id);
    $benutzer->vorname = $vorname;
    $benutzer->nachname = $nachname;
    $benutzer->email =$email;
    $benutzer_manager->update($benutzer);
    header('Location: benutzer_read.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>