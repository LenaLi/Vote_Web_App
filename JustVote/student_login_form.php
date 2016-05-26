// nicht notwendig!!!!!!!


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

                <h2>Login für Studenten</h2>
                <h5>der Hochschule der Medien Stuttgart mit dem Hochschul-Account</h5>

                <form class="form-horizontal" role="form" action="student_login_do.php" method="post">

                    <!-- Texteingabefeld für E-Mail-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail" required="required">
                        </div>
                    </div>
                    <!-- Texteingabefeld für Passwort-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Passwort">
                        </div>
                    </div>
                    <!-- Login Button-->
                    <div class="form-group">
                        <div class=" col-sm-9">
                            <button type="submit" class="btn btn-warning"> Login</button>
                        </div>
                    </div>
                    <!-- Link Registrieren-->
                    <a href="student_register_form.php">Registrieren</a>
            </div>


        </div>
    </div>
</div>


</body>
</html>



