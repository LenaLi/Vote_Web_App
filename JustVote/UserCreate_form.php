<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<body>



<div class="container">
    <h2>Neuer Benutzer</h2>

    <form class="form-horizontal" role="form" action="UserCreate_do.php" method="post">

        <div class="form-group">
            <label class="control-label col-sm-2" for="login">Benutzername:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="login" id="login" placeholder="Benutzername">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="vorname">Vorname:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="vorname" id="vorname" placeholder="Vorname">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="nachname">Nachname:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nachname" id="nachname" placeholder="Nachname">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="password">Kennwort:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="password">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="password2">Kennwort (Wiederholung):</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password2" id="password2">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>

</div>

</body>
</html>