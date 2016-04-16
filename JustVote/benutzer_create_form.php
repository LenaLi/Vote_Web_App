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

<h2>Benutzer hinzufügen</h2>

<form class="form-horizontal" role="form" action="benutzer_create_do.php" method="post">

    <div class="form-group">
        <div class="col-sm-6">
            <input type="text" class="form-control" name="vorname" id="vorname" placeholder="Vorname">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6">
            <input type="text" class="form-control" name="nachname" id="nachname" placeholder="Nachname">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6">
            <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <select name="role">
                <option value="Benutzer" selected>Benutzer</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class=" col-sm-6">
            <button type="submit" class="btn btn-warning"> Benutzer hinzufügen</button>
        </div>
    </div>

                </div>


            </div>
        </div>
    </div>
</div>

</div>

</body>
</html>



















