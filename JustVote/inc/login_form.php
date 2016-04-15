<!-- LOGIN DIALOG -->


    <!DOCTYPE html>
    <html>

    <?php include("inc/head.php"); ?>

    <body>

    <?php include("inc/navbar_loggedout.php"); ?>

    <div class="login">
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


<!--  <div class="login">
    <form class="form-horizontal" role="form" action="login_do.php" method="post">

        <div class="form-group">
            <div class="col-sm-12">
                <input type="text" class="form-control" name="login" id="login" placeholder="Benutzername">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <input type="password" class="form-control" name="password" id="password" placeholder="Passwort">
            </div>
        </div>

        <div class="form-group">
            <div class=" col-sm-offset-4 col-sm-12">
                <button type="submit" class="btn btn-warning">Login</button>
            </div>
        </div>
    </form>

</div>