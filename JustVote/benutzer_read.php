<?php include("inc/session_check.php"); ?>
<?php include("inc/session_check_admin.php"); ?>


<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<?php
require_once("Mapper/benutzer.php");
require_once("Mapper/benutzer_manager.php");

$manager=new benutzer_manager();
$allebenutzer = $manager->findAll();

?>

<body>

<?php include("inc/navigation.php"); ?>

<div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Benutzerübersicht</h1>
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
                        foreach ($allebenutzer as $benutzer ) {
                            echo "<tr>";
                            echo "<td>" . $benutzer->vorname . "</td>";
                            echo "<td>" . $benutzer->nachname . "</td>";
                            echo "<td>" . $benutzer->email . "</td>";
                            echo "<td>" . $benutzer->role . "</td>";
                            echo "<td>
                                <a class='fa fa-edit' href ='benutzer_update_form.php?id=".$benutzer->id."'></a>
                                
                                </td>";
                            echo "<td>
                                <a class='fa fa-trash'href ='benutzer_delete_do.php?id=".$benutzer->id."'></a>
                            </td>";
                            echo "</tr>";
                        }
                        ?>

                        </tbody>
                    </table>

                    <div class="form-group">
                        <div class=" col-sm-6">
                            <a href="benutzer_create_form.php">
                                <button type="submit" class="btn btn-warning"> Benutzer hinzufügen</button>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

</div>

</body>
</html>























