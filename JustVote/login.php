

<?php include("inc/header.php"); ?>

<body class="login-body">


<!-- LOGO -->
<div class="login-body">
    <img src="http://mars.iuk.hdm-stuttgart.de/~ll033/pics/Logo_JustVote.svg" />
</div>

<body>



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