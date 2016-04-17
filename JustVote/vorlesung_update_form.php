<?php include("inc/session_check.php"); ?>
<?php include("inc/session_check_admin.php"); ?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php");
require_once("Mapper/vorlesung_manager.php");
require_once("Mapper/vorlesung.php");
?>
<?php

$vorlesungsid = htmlspecialchars($_GET["vorlesungsid"], ENT_QUOTES, "UTF-8");
$vorlesung_manager = new vorlesung_manager();
$vorlesung = $vorlesung_manager->findByVorlesungsId($vorlesungsid);

echo $vorlesungsid;
?>

<body>

<?php include("inc/navbar_loggedin.php"); ?>

<div id="wrapper">

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h1>Eintrag <?php echo $vorlesung->vorlesungsid ?></h1>

                    <form action='vorlesung_update_do.php' method='post'>
                        <input type='hidden' name='vorlesungsid' value='<?php echo $vorlesung->vorlesungsid ?>' /
                        <br>
                        <input type='text' name='benutzerid' value='<?php echo $vorlesung->benutzerid ?>' /><br>
                        Vorlesungsname:<br>
                        <input type='text' name='vorlesungsname' value='<?php echo $vorlesung->vorlesungsname ?>' /><br>

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