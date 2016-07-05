<!-- Standard Navigation für die Dashboard Ansicht der Applikation-->



<!-- Just Vote CSS -->
<link href="css/just_vote.css" rel="stylesheet">


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
                 src="css/Logo_JustVote.svg">  </img>

        </div>


        <!-- Header Top Menü (oben rechts) -->
        <ul class="nav navbar-right top-nav">


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Herzlich
                    Willkommen, <?php echo $_SESSION["name"]; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">


                    <li>
                        <a href="benutzer_password_update_form.php"><i class="fa fa-fw fa-gear"></i> Passwort ändern
                        </a>
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

                <!-- Übersicht -->
                <li>
                    <a href="uebersicht.php"><i class="fa fa-fw fa-dashboard"></i> Übersicht</a>
                </li>

                <!-- Vorlesung -->
                <li>
                    <a href="vorlesung_create_form.php"><i class="fa fa-plus"></i> Vorlesung</a>
                </li>

                <!-- Voting -->
                <li>
                    <a href="voting_create_form.php"><i class="fa fa-plus"></i> Voting</a>
                </li>

                <li>
                    <a href="charts.php"><i class="fa fa-fw fa-bar-chart-o"></i> Übersicht Ergebnisse</a>
                </li>

                <hr class="line">
                </hr>

                <?php
                // Überprüfung ob Eingeloggter Admin ist oder normaler Benutzer --> Nur dann Zugriff auf Verwaltung der Benutzer
                if ($_SESSION["role"] == "admin") {

                    ?>

                    <!-- Benutzer erstellen -->

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-users"></i>
                            Dozenten <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="benutzer_create_form.php"> <i class="fa fa-fw fa-plus"></i> Dozent hinzufügen</a>
                            </li>
                            <li>
                                <a href="benutzer_read.php"> <i class="fa fa-fw fa-dashboard"></i> Übersicht Dozenten</a>
                            </li>
                        </ul>
                    </li>


                    <?php

                }
                ?>


                <li>
                    <a align="bo" href="impressum.php"><i class="fa fa-info "></i> Impressum </a>
                </li>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>









