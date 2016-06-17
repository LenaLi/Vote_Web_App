<!-- Custom CSS -->
<link href="css/sb-admin.css" rel="stylesheet">




<div id="wrapper">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <!-- Toggle für die Mobile Version -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

                <img class="navbar-logo" href="uebersicht.php" title="JustVote"
                     src="http://mars.iuk.hdm-stuttgart.de/~ll033/pics/Logo_JustVote.svg">  </img>

        </div>


        <!-- Header Top Menü (oben rechts) -->
        <ul class="nav navbar-right top-nav">


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION["name"]; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">


                    <li>
                        <a href="benutzer_password_update_form.php"><i class="fa fa-fw fa-gear"></i> Passwort ändern </a>
                    </li>

                    <li class="divider"></li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>



        <!-- Sidebar Links-->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li >
                    <a href="uebersicht.php"><i class="fa fa-fw fa-dashboard"></i> Übersicht</a>
                </li>

                <li>
                    <a href="vorlesung_create_form.php"><i class="fa fa-plus"></i> Vorlesung</a>
                </li>
                <li>
                    <a href="voting_create_form.php"><i class="fa fa-plus"></i> Voting</a>
                </li>

                <?php
                // Überprüfung ob Eingeloggter Admin ist oder normaler Benutzer --> Nur dann Zugriff auf Verwaltung der Benutzer
                if ($_SESSION["role"]=="admin") {

                    ?>
                    <li>
                        <a href="benutzer_read.php"><span class="glyphicon glyphicon-user"></span> Benutzer verwalten</a>
                    </li>
                    <li>
                        <a href="benutzer_create_form.php"><span class="fa fa-plus"></span> Benutzer</a>
                    </li>

                    <?php

                }
                ?>


                <li>
                    <a href="charts.php"><i class="fa fa-fw fa-bar-chart-o"></i>  Übersicht Ergebnisse</a>
                </li>

                </br>

                <li >
                    <a href="impressum.php"><i class="fa fa-info "></i> Impressum </a>
                </li>

               <!-- <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo" class="collapse">
                        <li>
                            <a href="#">Dropdown Item</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Item</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                </li>
                <li>
                    <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>









