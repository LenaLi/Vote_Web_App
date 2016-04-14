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

                    <table  class="table table-hover">
                        <thead>
                        <th>id</th>
                        <th>Voting Name</th>
                        <th>Datum</th>
                        <th>Aktionen</th>
                        <th></th>
                        </thead>
                        <tbody>

                        <?php

                        require_once("Mapper/Notiz.php");
                        require_once("Mapper/NotizManager.php");
                        $notizManager = new NotizManager();
                        $liste = $notizManager->findAll();
                        foreach ($liste as $notiz) {
                            echo "<tr>";
                            echo "<td>$notiz->id</td>";
                            echo "<td>$notiz->betreff</td>";
                            echo "<td>$notiz->name</td>";
                            echo "<td>
                    <a href='NotizRead.php?notiz_id=$notiz->id' class='btn btn-success btn-xs'>zeige</a>&nbsp;
                    <a href='NotizUpdate_form.php?notiz_id=$notiz->id' class='btn btn-info btn-xs'>editiere</a>&nbsp;
                    <a href='NotizDelete_do.php?notiz_id=$notiz->id' class='btn btn-info btn-danger btn-xs'>l&ouml;sche</a>
                </td>";
                            echo "<td></td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>

</body>
</html>







