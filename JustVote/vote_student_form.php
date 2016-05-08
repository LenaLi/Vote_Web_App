<?php
include("inc/session_check.php");
include("inc/header.php");
include("inc/navigation.php");
require_once("Mapper/voting.php");
require_once("Mapper/voting_manager.php");

        $votingmanager =new voting_manager();
        $_SESSION["votingid"] =htmlspecialchars($_GET["id"], ENT_QUOTES, "UTF-8");
        $votings = $votingmanager->findByVotingId($_SESSION["votingid"]);

?>


<!DOCTYPE html>
<html>
<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">

                <form action="vote_student_do.php" method="post">
                    <table>


                        <?php

                        //sessionvariable mit anzahl der antwortmöglichkeiten
                        $_SESSION ["anzahlantworten"]=2;


                           if($votings==null)
                            {
                                //kein Datensatz gefunden
                                echo '<h2>Kein Datensatz wurde gefunden</h2>';
                            }

                                // Durchgehen der Datensätze
                                // der Session wird der Wert des angeklickten Datensatz zugewiesen
                                // votings ist der große container, foreach-schleife macht neue variable voting in der schleife ruft man aktuelles ergebnis ab
                                foreach($votings as $voting)
                               {

                                    $_SESSION["A1"] = $voting->antwort_1;
                                    $_SESSION["A2"] = $voting->antwort_2;
                                    $_SESSION["A3"] = $voting->antwort_3;
                                    $_SESSION["A4"] = $voting->antwort_4;
                                }

                        ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo '<h2>' . $voting->frage . '</h2>';
                                            ?>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <?php
                                            echo '<input type="radio" name="rb_voting" value="antwort_1"/>' . $_SESSION["A1"];
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <?php
                                            echo '<input type="radio" name="rb_voting" value="antwort_2"/>' . $_SESSION["A2"];
                                            ?>
                                        </td>
                                    </tr>

                                    <?php
                                    if ($_SESSION["A3"] != '') {
                                        echo '<tr>
                                        <td>';
                                        echo '<input type="radio" name="rb_voting" value="antwort_3"/>' . $_SESSION["A3"];
                                        echo '</td>
                                    </tr>';
                                        $_SESSION ["anzahlantworten"]++;
                                    }
                                    if ($_SESSION["A4"] != '') {
                                        echo '<tr>
                                        <td>';
                                        echo '<input type="radio" name="rb_voting" value="antwort_4"/>' . $_SESSION["A4"];
                                        echo '</td>
                                    </tr>';
                                        $_SESSION ["anzahlantworten"]++;
                                    }
                        ?>

                        <tr>
                            <td>
                                <input type="submit" name="Abschicken" value="Abschicken">
                            </td>
                        </tr>
                    </table>
                    </form>

                </div>
            </div>
        </div>

    </div>
</body>
</html>