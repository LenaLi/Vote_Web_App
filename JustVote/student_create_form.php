

<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<body class="mitte">

<!-- LOGO -->
<div class="mitte">
    <img src="http://mars.iuk.hdm-stuttgart.de/~ll033/pics/Logo_JustVote.svg" />
</div>


<div id="page-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h2>Anmeldung für Studenten</h2>
                <h5>der Hochschule der Medien Stuttgart mit dem Hochschul-Account</h5>

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
                            <input type="password" class="form-control" name="password" id="password" placeholder="Passwort">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <select name="role">

                                <option value="Student">Student</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class=" col-sm-6">
                            <button type="submit" class="btn btn-warning"> Anmelden</button>
                        </div>
                    </div>

            </div>


        </div>
    </div>
</div>


</body>
</html>
