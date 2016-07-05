<!-- Standard Navigation für Studenten, die sich ein Konto angelegt haben -->

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

            <a href="https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/student_uebersicht.php">

            <img class="navbar-logo" title="JustVote"
                 src="css/Logo_JustVote.svg">  </img> </a>
        </div>


        <!-- Header Top Menü (oben rechts) -->
        <ul class="nav navbar-right top-nav">


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="fa fa-user"></i> Herzlich
                    Willkommen, <?php echo $_SESSION["name"]; ?> <b class="caret"></b></a>
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
                    <a href="ueber_just_vote.php"><i class="fa fa-fw fa-university"></i> Über Just Vote </a>
                </li>

                <li>
                    <a href="student_impressum.php"><i class="fa fa-fw fa-info "></i> Impressum </a>
                </li>


    </nav>









