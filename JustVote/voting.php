
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

                    <h2>Neues Voting</h2>

                    <form class="form-horizontal" role="form" action="login_do.php" method="post">

                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" id="voting" placeholder="Name des Votings">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                        <select class="c-select">
                            <option selected>Vorlesung auswählen</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                                </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-6"
                            <label for="exampleTextarea"</label>
                            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Frage"></textarea>
                            </div>
                        </div>


                         <div class="form-group">
                             <div class="col-sm-6"
                             <label for="exampleTextarea"</label>
                             <textarea class="form-control" id="exampleTextarea" rows="2" placeholder="Antwortmöglichkeit 1"></textarea>
                            </div>
                         </div>

                        <div class="form-group">
                            <div class="col-sm-6"
                            <label for="exampleTextarea"</label>
                            <textarea class="form-control" id="exampleTextarea" rows="2" placeholder="Antwortmöglichkeit 2"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6"
                            <label for="exampleTextarea"</label>
                            <textarea class="form-control" id="exampleTextarea" rows="2" placeholder="Antwortmöglichkeit 3"></textarea>
                            </div>
                        </div>

    <div class="form-group">
        <div class="col-sm-6"
        <label for="exampleTextarea"</label>
        <textarea class="form-control" id="exampleTextarea" rows="2" placeholder="Antwortmöglichkeit 4"></textarea>
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







































