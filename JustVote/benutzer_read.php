<?php include("inc/session_check.php"); ?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<body>

<?php include("inc/navbar_loggedin.php"); ?>

<div id="wrapper">



    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Benutzerübersicht</h1>
                    <p></p>

                    <table  class="table table-hover">
                        <thead>
                        <th>Benutzername</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Rolle</th>
                        </thead>
                        <tbody>
                    </table>
<!-- Datenbank einträge auslesen und als html darstellen-->
                    <div class="form-group">
                        <div class=" col-sm-6">
                            <a href="benutzer_create_form.php">
                                <button type="submit" class="btn btn-warning">Benutzer neu hinzufügen</button>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>



























