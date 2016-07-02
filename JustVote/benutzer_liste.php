<?php
include("inc/session_check.php");
include("inc/session_check_admin.php");
require_once("Mapper/benutzer.php");
require_once("Mapper/benutzer_manager.php");
require_once("Mapper/voting_manager.php");
?>


<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<body>

<?php include("inc/navigation.php"); ?>

<div id="page-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <?php
                // Objekt von benutzer_manager erzeugen, welcher Datenbankverbindung besitzt
                $manager=new benutzer_manager();

                // alle Benutzer aus der Datenbank auslesen und in Array alleBenutzer speichern
                $alleBenutzer = $manager->findAll();

                // Successmeldung anzeigen, wenn Success Parameter mitgeliefert wird
                if ($_GET["success"]=="1"){

                    // HTML Code für Successmeldung erzeugen
                    echo "<div class='alert alert-success'> <strong> Erfolgreich: </strong>Benutzer wurde angelegt und E-Mail mit den Zugangsdaten wurde versendet! </div>";
                }
                ?>
                <h1>Benutzerübersicht</h1>

                <table  class="table table-hover">
                    <thead>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Anzahl Votings</th>
                    <th></th>
                    </thead>
                    <tbody>

                    <?php
                    // Zeilen der HTML-Tabelle werden erzeugt mit Hilfe der foreach-Schleife
                    foreach ($alleBenutzer as $benutzer ) {
                        echo "<tr>";
                        echo "<td>" . $benutzer->vorname . "</td>";
                        echo "<td>" . $benutzer->nachname . "</td>";

                        $manager=new voting_manager();
                        $AnzahlVotings = $manager->countvorlesungsid($benutzer->id);

                        foreach ($AnzahlVotings as $AnzahlVotingBenutzer)
                        {
                            $ZahlDerVotings = $AnzahlVotingBenutzer[Anzahl];
                            echo "<td>" . $ZahlDerVotings . "</td>";
                        }

                        echo "<td>
                                <a class='fa fa-edit'href ='benutzer_profil.php?id=".$benutzer->id."'></a>

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








