<?php
include("inc/session_check.php");
require_once("Mapper/voting_manager.php");
require_once("Mapper/voting.php");
include("inc/header.php");
include("inc/navigation_mitte.php");
include("inc/social_plugin/social_plugin.php");
require_once("Mapper/vorlesung.php");
require_once("Mapper/vorlesung_manager.php");
?>


<!-- ID auslesen -->
<?php
// ID wird ausgelesen und an URL drangehängt
$aktuellesvoting = $_GET['id'];

// Objekt von voting_manager erzeugen, welcher Datenbankverbindung besitzt
$voting_manager = new voting_manager();

// lese Voting aus Datenbank mit der Funktion findByVotingID
$voting = $voting_manager->findByVotingId($aktuellesvoting);

?>

<body class="mitte">

<div>

    <?php
    //Ausgeben des Votingnamen zur zugehörigen ID
    echo "Umfrage:" . "<h1>" . $voting->votingname . "</h1>";
    ?>


    <br>
    <?php
    // Ausgeben des Links mit der jeweiligen ID
    echo '<a href= https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/vote_student_form.php?id=' . $aktuellesvoting . ">https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/vote_student_form.php?id='.$aktuellesvoting</a>";
    ?>

    <br>
    <br>

    <?php
    // generierter QR Code wird mit entspechender ID eingefügt
    echo '<img src="link_fuer_studenten_qrcode.php?id=' . $aktuellesvoting . '" />';
    ?>

    <br>
    <br>




    <!-- Facebook Share Button JavaScript -->
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


    <!-- Facebook Share Button -->
<div class="mitte">
    <div class="fb-share-button"
         data-href="<?php
         echo "https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/vote_student_form.php?id=.$aktuellesvoting.";
         ?>"
         data-layout="button">
    </div>
</div>


    <!-- Mail Share Button -->
<div class="mitte">
    <a class="fa fa-envelope"
       href="mailto:?subject=Einladung zur Teilnahme an der Umfrage <?php echo $voting->votingname; ?>&amp;body=<?php
       echo 'Hallo liebe Studenten';
       echo "unter diesem Link können Sie an der Umfrage '$voting->votingname' teilnehmen: https://mars.iuk.hdm-stuttgart.de/~cm102/JustVote/vote_student_form.php?id=.$aktuellesvoting";
       ?>"
       title="Link per Mail verschicken">
    </a>
</div>

</div>
</body>
</html>

