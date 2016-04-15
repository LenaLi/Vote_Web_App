<?php include("inc/session_check.php"); ?>

<?php

require_once("Mapper/UserManager.php");
require_once("Mapper/user.php");

$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$nachname = htmlspecialchars($_POST["nachname"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
$password2 = htmlspecialchars($_POST["password2"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($vorname) && !empty($nachname) && !empty($password) && !empty($password2)) {
    $nutzerdaten = [
        "login" => $login,
        "vorname" => $vorname,
        "nachname" => $nachname,
        "hash" => password_hash($password, PASSWORD_DEFAULT)
    ];
    $user = new User($nutzerdaten);
    $userManager = new UserManager();
    $userManager->create($user);
    header('Location: index.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";
}