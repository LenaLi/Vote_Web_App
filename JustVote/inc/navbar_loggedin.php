<!-- Namen der Datei ändern, Mobile Version fertig machen (das komplettes Menü auch in der Sidebar mit verschwindet -->

<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <!-- Navigation im Header + Mobile -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
            <a class="navbar-brand" rel="home" href="uebersicht.php" title="JustVote"> 
                <!-- TO DO: Style in CSS packen! -->
                <img style="width:60%;height:100%; margin-top:0px;" 
                     src="http://mars.iuk.hdm-stuttgart.de/~ll033/pics/Logo_JustVote.svg">  </a>
        </div>

        <!-- Hier wird alles für das Toggle Menü gesammelt-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <!-- Hier vielleicht ein Link zum Benutzerdaten ändern einfügen? -->
                    <a href="#">
                        <span class="glyphicon glyphicon-user"></span>

                        <!-- Anzeigen des aktuellen Usernames -->
                        Herzlich Willkommen, <?php echo $_SESSION["name"]; ?>
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



    <!-- Sidebar (Namen ändern und CSS in bootstrap integrieren-->

    <div id="sidebar-wrapper">



        <ul class="sidebar-nav">
            <li>
                <a href="uebersicht.php"><span class="glyphicon glyphicon-th-large"></span> Übersicht</a>
            </li>
            <li>
                <a href="vorlesung_create_form.php"><span class="fa fa-plus"></span> Vorlesung </a>
            </li>
            <li>
                <a href="voting_create_form.php"> <span class="fa fa-plus"></span> Voting </a>
            </li>
            <?php
            // Überprüfung ob Eingeloggter Admin ist oder normaler Benutzer --> Nur dann Zugriff auf Verwaltung der Benutzer
            if ($_SESSION["role"]=="admin") {

                ?>
                <li>
                    <a href="benutzer_read.php"><span class="glyphicon glyphicon-user"></span> Benutzer verwalten</a>
                </li>
                <?php

            }
            ?>
        </ul>

    </div>
    <!-- /#sidebar-wrapper -->
</nav>

