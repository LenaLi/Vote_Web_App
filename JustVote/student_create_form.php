

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

                    <!-- Texteingabefeld für Vorname-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="vorname" id="vorname" placeholder="Vorname" required="required">
                        </div>
                    </div>
                    <!-- Texteingabefeld für Nachname-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nachname" id="nachname" placeholder="Nachname" required="required">
                        </div>
                    </div>
                    <!-- Texteingabefeld für E-Mail-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail" required="required">
                        </div>
                    </div>

                    <!-- TODO: Auswahlfeld der Rolle STUDENT-->
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
