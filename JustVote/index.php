<!DOCTYPE html>
<html>

    <?php include("inc/header.php"); ?>

    <body class="login-body">
        <!-- LOGO -->
            <div class="login-body">
                <img src="http://mars.iuk.hdm-stuttgart.de/~ll033/pics/Logo_JustVote.svg" />
            </div>

        <!DOCTYPE html>
        <html>

        php include("inc/head.php");

        <body>

        php include("inc/navbar_loggedout.php");

        <div class="container">
            <h2>Login</h2>

            <form class="form-horizontal" role="form" action="login_do.php" method="post">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="login">Benutzername:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="login" id="login" placeholder="Benutzername">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="password">Kennwort:</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Kennwort">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Login</button>
                    </div>
                </div>
            </form>

        </div>

        </body>
        </html>

<!--
        session_start();
        if ($_SESSION ["login"]<>"1") {
            // user not logged in
            $_SESSION = array();
            session_destroy();
            // Einbinden von Login Dialog
            include("inc/login_form.php");
            // Prüfung ob Benutzername und Passwort schon einmal falsch eingegeben wurden
            if($_GET["error"]==1){
    ?>
            <div class=h5 style="color: #F07F31; font-weight: bold">Benutzername oder Passwort falsch!</div>

            }
        } else {
            // user logged in
            // Weiterleitung zur Übersichts-Seite
            header('Location: uebersicht.php');
        }
    ?>

    </body>
</html>