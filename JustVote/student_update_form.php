<?php include("inc/session_check.php"); ?>
<?php include("inc/session_check_admin.php"); ?>

<!DOCTYPE html>
<html>

<?php
include("inc/header.php");
require_once("Mapper/student_manager.php");
require_once("Mapper/student.php");
?>

<?php
$student_id = htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8"); //id??
$student_manager = new student_manager();
$student = $student_manager->findById($student_id); // id??
echo $student_id;  // id????
?>

<body>

<?php include("inc/navigation.php");?>

<div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h1>Eintrag <?php echo $student->student_id ?></h1> <!-- id -->

                    <form action='student_update_do.php' method='post'>
                        <input type='hidden' name='id' value='<?php echo $student->student_id ?>' /> <!--id??   -->
                        Vorname:<br>
                        <input type='text' name='vorname' value='<?php echo $student->vorname ?>' /><br>
                        Nachname:<br>
                        <input type='text' name='nachname' value='<?php echo $student->nachname ?>' /><br>
                        <br>
                        E-Mail:<br>
                        <input type='text' name='email' value='<?php echo $student->email ?>' /><br>
                        <br>
                        <br>
                        <input type='submit' value='update!' />
                    </form>
                </div>
            </div>
        </div>

</div>

</div>
</body>
</html>