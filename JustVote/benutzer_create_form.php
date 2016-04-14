<?php include("inc/session_check.php"); ?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php"); ?>

<body>

<?php include("inc/navbar_loggedin.php"); ?>

<div id="wrapper">

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h2>Neue Vorlesung</h2>

                    <form class="form-horizontal" role="form" action="login_do.php" method="post">

                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" id="vorlesung" placeholder="Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="id" id="" placeholder="Vorlesungs ID">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" col-sm-6">
                                <button type="submit" class="btn btn-warning">Erstellen</button>
                            </div>
                        </div>
                    </form>







                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>

</body>
</html>

























