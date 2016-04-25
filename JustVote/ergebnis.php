<?php include("inc/session_check.php"); ?>
<?php include("inc/header.php"); ?>

<!DOCTYPE html>
<html>
<body>
<div id="diagramm">

    <?php

    $balken_x = $abstand;
    $balken_y = $hoehe - $abstand;
    $balken_b = 2 * $abstand;
    $diagramm_h = $hoehe - 2 * $abstand;
    $balken_versatz = 0;

    $legende_x = $balken_x + sizeof($werte) *
    $balken_b + (sizeof($werte) - 1) * $abstand + 2 * $abstand;
    $legende_y = $hoehe - $abstand -
    $legende_abstand;
    $legende_b = $legende_x + $legende_abstand;
    $legende_h = $legende_y + $legende_abstand;
    $legende_versatz = 0;

    for($i=0; $i<sizeof($werte); $i++) {

    $prozent = 100 / array_sum($werte)
    * $werte[$i];
    $balken_h = $diagramm_h / 100 *
    $prozent;

    $wert = $werte[$i]." ".$einheit;

    $farbe = "farbe_".$farben[$i];

    imagefilledrectangle($bild,
    $balken_x + $balken_versatz, $abstand, $balken_x + $balken_versatz +
    $balken_b, $hoehe - $abstand, $farbe_zwischen);
    imagefilledrectangle($bild,
    $balken_x + $balken_versatz, $balken_y - $balken_h, $balken_x +
    $balken_versatz + $balken_b, $balken_y, ${$farbe});
    imagestring($bild, $schrift,
    $balken_x + $balken_versatz + 2, $balken_y - $balken_h -
    $abstand_text_h, $werte[$i], $farbe_text);

    imagefilledrectangle($bild,
    $legende_x, $legende_y - $legende_versatz, $legende_b, $legende_h -
    $legende_versatz, ${$farbe});
    imagestring($bild, $schrift,
    $legende_x + 2 * $legende_abstand, $legende_y - $legende_versatz,
    $bezeichnungen[$i], $farbe_text);
    imagestring($bild, $schrift,
    $legende_x + 3 * $legende_abstand + $abstand_text, $legende_y -
    $legende_versatz, $wert, $farbe_text);

    $balken_versatz = $balken_versatz +
    3 * $abstand;
    $legende_versatz = $legende_versatz
    + 2 * $legende_abstand;



?>


    <?php
    /*
        $antwort_1=70;
        $antwort_2=30;

        $maxhoehe=400;


        echo '<div class="result" style="width: 150px; height: '.($antwort_1*($maxhoehe/100)).'px; background-color: #d58512; float: left;">';
        echo '<p>'.$antwort_1.'</p>';

        echo '</div>';

        echo '<div class="result" style="width: 150px; height: '.($antwort_2*($maxhoehe/100)).'px; background-color: pink; margin-left: 200px;">';
        echo '<p>'.$antwort_2.'</p>';

        echo '</div>';*/
    ?>

</div>


</body>



</html>



<!--
<body class="login-body">
        <!-- LOGO
        <div class="login-body">
            <img src="http://mars.iuk.hdm-stuttgart.de/~ll033/pics/Logo_JustVote.svg" />
        </div>

        <div class="progress">
            <div class="progress-bar-result" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
               <p class="h6">Hier steht die Antwort </p>
            </div>
        </div>
        <div class="progress">
            <div class="progress-bar-result" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                <p class="h6">Hier steht die Antwort </p>
            </div>
        </div>
        <div class="progress">
            <div class="progress-bar-result" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                <p class="h6">Hier steht die Antwort </p>
            </div>
        </div>
        <div class="progress">
            <div class="progress-bar-result" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                <p class="h6">Hier steht die Antwort </p>
            </div>
        </div>
</body>
</html>
-->