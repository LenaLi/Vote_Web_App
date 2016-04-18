<?php include("inc/session_check.php"); ?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<body>

<?php include("inc/navbar_loggedin.php"); ?>

<div id="wrapper">


    <!-- Page Content test -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Ihre Vorlesungen und Votings</h1>
                    <p></p>

                    <?php
                        // DB Abfrage zu Vorlesungen von Benutzer.....
                        require_once("Mapper/vorlesung.php");
                        require_once("Mapper/vorlesung_manager.php");
                        //DB Abfrage zu Votings
                    
                        $vorlesungsmanager =new vorlesung_manager();
                        $vorlesungen = $vorlesungsmanager->findByBenutzerId($_SESSION['benutzerid']);

                        foreach($vorlesungen as $vorlesung){
                            echo "<table border='1'>";
                            // Überschriften der Tabellen
                                echo "<thead><tr>";
                                echo "<th colspan='6'>" . $vorlesung->vorlesungsid .", ". $vorlesung->vorlesungsname;
                                echo " <a class='fa fa-edit' href ='vorlesung_update_form.php?id=".$vorlesung->vorlesungsid."'></a>";
                                echo " <a class='fa fa-trash'href ='vorlesung_delete_do.php?id=".$vorlesung->vorlesungsid."'></a>";
                                echo  "<th>";
                                echo "</tr> </thead>";


                                /*foreach($votings as $voting){
                                    echo "<tr>";

                                    echo "</tr>";
                                }*/
                            echo "</table>";
                        }
                    ?>



                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>






