<?php include("inc/session_check.php");?>

<!DOCTYPE html>
<html>

<?php include("inc/header.php");?>

<body>

<?php include("inc/navigation.php");?>

<div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h2>Vorlesung hinzufügen</h2>

                    <form class="form-horizontal" role="form" action="vorlesung_create_do.php" method="post">

                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="vorlesungsid" id="vorlesungsid" placeholder="ID der Vorlesung">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="vorlesungsname" id="vorlesungsname" placeholder="Vorlesungsname">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class=" col-sm-6">
                                <button type="submit" class="btn btn-warning"> Erstellen</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</div>

</div>

</body>
</html>
