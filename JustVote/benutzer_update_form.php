<?php include("inc/session_check.php"); ?>
<?php include("inc/session_check_admin.php"); ?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php");
require_once("Mapper/benutzer_manager.php");
require_once("Mapper/benutzer.php");
?>
<?php

$id = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");
$benutzer_manager = new benutzer_manager();
$benutzer = $benutzer_manager->findById($id);

echo $id;
?>

<body>

<?php include("inc/navbar_loggedin.php"); ?>

<div id="wrapper">

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

    <h1>Eintrag <?php echo $benutzer->id ?></h1>

    <form action='benutzer_update_do.php' method='post'>
        <input type='hidden' name='id' value='<?php echo $benutzer->id ?>' />
        Vorname:<br>
        <input type='text' name='vorname' value='<?php echo $benutzer->vorname ?>' /><br>
        Nachname:<br>
        <input type='text' name='nachname' value='<?php echo $benutzer->nachname ?>' /><br>
        <br>
        E-Mail:<br>
        <input type='text' name='email' value='<?php echo $benutzer->email ?>' /><br>
        <br>
        <br>
        <input type='submit' value='update!' />
    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
</body>
</html>