<!-- TO DO: Passwort vergessen Button?? -->
<div class="login">


       <form class="form-horizontal" role="form" action="login_do.php" method="post">

           <!-- Texteingabefeld für E-Mail-->
               <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail">
                        </div>
               </div>
           <!-- Eingabefeld für Passwort-->
                <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Passwort">
                        </div>
                </div>

           <!-- Login Button-->
                <div class="form-group">
                        <div class=" col-sm-offset-4 col-sm-12">
                            <button type="submit" class="btn btn-warning">Login</button>
                        </div>
                </div>

       </form>
                    <a href="student_login_form.php">Student? Hier gehts zum Studentenlogin</a>
    
</div>
