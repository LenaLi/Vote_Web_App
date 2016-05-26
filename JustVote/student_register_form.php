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
                
                <?php
                if($_GET["error"]=="1"){
                    ?>
                    <div class=h5 style="color: #F07F31; font-weight: bold">Passwort stimmt nicht überein!</div>

                    <?php
                }
                ?>
                <?php
                if($_GET["error"]=="2"){
                    ?>
                    <div class=h5 style="color: #F07F31; font-weight: bold">Bitte Felder ausfüllen!</div>

                    <?php
                }
                ?>
                <h2>Registrierung für Studenten</h2>
                <h5>der Hochschule der Medien Stuttgart mit dem Hochschul-Account</h5>

                <form class="form-horizontal" role="form" action="student_register_do.php" method="post">

                    <!-- Texteingabefeld für Vorname-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="vorname" id="vorname" placeholder="Vorname" required="required">
                        </div>
                    </div>
                    <!-- Texteingabefeld für Nachname-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="nachname" id="nachname" placeholder="Nachname" required="required">
                        </div>
                    </div>

                    <!-- Texteingabefeld für E-Mail-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail" required="required">
                        </div>
                    </div>
                    <!-- Texteingabefeld für Passwort-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password1" id="password1" placeholder="Passwort"required="required">
                        </div>
                    </div>
                    <!-- Texteingabefeld für Passwort-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="Passwort wiederholen"required="required">
                        </div>
                    </div>
                    <!-- Login Button-->
                    <div class="form-group">
                        <div class=" col-sm-9">
                            <button type="submit" class="btn btn-warning">Registrieren</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


