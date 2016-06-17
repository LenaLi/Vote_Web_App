<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>
<?php include("inc/navigation_mitte.php"); ?>


<body class="mitte">


                
                <?php
                if($_GET["error"]=="1"){
                    ?>
                    <div class=btn-danger style="color: #F07F31; font-weight: bold">Passwort stimmt nicht überein!</div>
                    <?php
                }
                ?>
                <?php
                if($_GET["error"]=="2"){
                    ?>
                    <div class=btn-danger style="color: #F07F31; font-weight: bold">Bitte Felder ausfüllen!</div>
                    <?php
                }
                ?>
                <?php
                if($_GET["error"]=="3"){
                    ?>
                    <div class=btn-danger style="color: #F07F31; font-weight: bold">Keine HdM E-Mail Adresse!</div>
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
                            <input type="text" class="form-control" name="nachname" id="nachname" placeholder="Nachname" required="required">
                        </div>
                    </div>

                    <!-- Texteingabefeld für E-Mail-->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail" required="required">
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

</body>
</html>


