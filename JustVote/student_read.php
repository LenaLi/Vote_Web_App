<?php include("inc/session_check.php"); ?>
<?php include("inc/session_check_admin.php"); ?>


<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<?php
require_once("Mapper/student.php");
require_once("Mapper/student_manager.php");

$manager=new student_manager();
$allestudenten = $manager->findAll();

?>

<body>

<?php include("inc/navigation.php"); ?>

<div id="page-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Studentenübersicht</h1>
                <p></p>

                <table  class="table table-hover">
                    <thead>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>E-Mail</th>
                    <th>Rolle</th>
                    <th> </th>
                    <th> </th>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($allestudenten as $student ) {
                        echo "<tr>";
                        echo "<td>" . $student->vorname . "</td>";
                        echo "<td>" . $student->nachname . "</td>";
                        echo "<td>" . $student->email . "</td>";
                        echo "<td>" . $student->role . "</td>";
                        echo "<td>
                                <a class='fa fa-edit' href ='student_update_form.php?id=".$student->student_id."'></a>  <!-- evtl muss ich statt id. student_is. schreiben! -->

                                </td>";
                        echo "<td>
                                <a class='fa fa-trash'href ='student_delete_do.php?id=".$student->student_id."'></a> <!-- same here-->
                            </td>";
                        echo "</tr>";
                    }
                    ?>

                    </tbody>
                </table>

                <div class="form-group">
                    <div class=" col-sm-6">
                        <a href="student_create_form.php">
                            <button type="submit" class="btn btn-warning"> Student hinzufügen</button>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>

</body>
</html>