<?php include("inc/session_check.php"); ?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<body>

<?php include("inc/navbar_loggedin.php"); ?>

<div id="wrapper">


    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Ihre Vorlesungen und Votings</h1>
                    <p></p>

                    <?php
                        // DB Abfrage zu Vorlesungen von Benutzer
                    
                        //DB Abfrage zu Votings

                        foreach($vorlesungen as $vorlesung){
                            echo "<table>";
                                echo "<tr><th>";
                                    // Überschriften der Tabellen
                                echo "</th></tr>";
                                foreach($votings as $voting){
                                    echo "<tr>";
                                        // Zeilen (Votings)
                                    echo "</tr>";
                                }
                            echo "</table>";
                        }
                    ?>

                    <table  class="table table-hover">
                        <thead>
                        <th>Vorlesung</th>
                        <th>ID der Vorlesung</th>

                        <th>Voting</th>
                        <th>Datum</th>
                        <th>Aktionen</th>
                        <th></th>
                        </thead>
                        <tbody>
                        

                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>






