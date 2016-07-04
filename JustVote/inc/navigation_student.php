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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="fa fa-user"></i> <?php echo $_SESSION["name"]; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">


                    <li>
                        <a href="student_password_update_form.php"><i class="fa fa-fw fa-gear"></i> Passwort ändern </a>
                    </li>

                    <li class="divider"></li>
                    <li>
                        <a href="student_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>


        <!-- Sidebar Links-->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">


                <!-- Übersicht -->
                <li>
                    <a href="student_uebersicht.php"><i class="fa fa-fw fa-dashboard"></i> Übersicht</a>
                </li>

                <li>
                    <a href="ueber_just_vote.php"><i class="fa fa-info "></i> Über Just Vote </a>
                </li>

                <li>
                    <a href="student_impressum.php"><i class="fa fa-info "></i> Impressum </a>
                </li>


    </nav>









