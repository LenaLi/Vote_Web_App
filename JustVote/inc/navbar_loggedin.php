

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
            <a class="navbar-brand" rel="home" href="uebersicht.php" title="JustVote"> 
                <img style="width:60%;height:100%; margin-top:0px;" 
                     src="http://mars.iuk.hdm-stuttgart.de/~ll033/pics/Logo_JustVote.svg">  </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-user"></span>
                        <!-- TODO: Was soll der Code machen? <?php echo $user->login; ?> -->
                        Herzlich Willkommen, <?php echo $_SESSION["user"]; ?>
                    </a>
                </li>
                <li class="dropdown">
                <li>
                    <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
                </li>

            </ul>




        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<nav class="sidebar-wrapper">

    <!-- Sidebar -->

    <div id="sidebar-wrapper">


        <ul class="sidebar-nav">
            <li>
                <a href="uebersicht.php">Übersicht</a>
            </li>
            <li>
                <a href="vorlesung.php"> <span class="fa fa-plus"></span> Vorlesung </a>
            </li>
            <li>
                <a href="voting.php"> <span class="fa fa-plus"></span> Voting </a>
            </li>
            <li>
                <a href="benutzer_uebersicht.php"> <span class="fa fa-plus"></span> Benutzer</a>
            </li>

        </ul>

    </div>
    <!-- /#sidebar-wrapper -->
</nav>