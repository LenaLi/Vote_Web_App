<?php
include("inc/session_check.php");
include("inc/session_check_admin.php");
require_once("Mapper/benutzer.php");
require_once("Mapper/benutzer_manager.php"); ?>


<!DOCTYPE html>
<html>

<?php
// Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
$manager=new benutzer_manager();

// alle Benutzer aus der Datenbank auslesen und in Array alleBenutzer speichern
$alleBenutzer = $manager->findAll();
?>

<?php include("inc/header.php"); ?>

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
                        // Zeilen der HTML-Tabelle werden erzeugt mit Hilfe der foreach-Schleife
                        foreach ($alleBenutzer as $benutzer ) {
                            echo "<tr>";
                            echo "<td>" . $benutzer->vorname . "</td>";
                            echo "<td>" . $benutzer->nachname . "</td>";
                            echo "<td>" . $benutzer->email . "</td>";
                            echo "<td>" . $benutzer->role . "</td>";
                            echo "<td>
                                <a class='fa fa-edit'href ='benutzer_update_form.php?id=".$benutzer->id."'></a>
                                
                                </td>";
                            echo "<td>

<!-- TODO: bei Klick auf Abbrechen nicht löschen  -->
                                <a class='fa fa-trash' onclick=confirm('xxx') href ='benutzer_delete_do.php?id=".$benutzer->id."' ></a>

                            </td>";
                            echo "</tr>";
                        }
                        ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

</div>

</body>
</html>








