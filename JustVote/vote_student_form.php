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

                           if($votings==null)
                            {
                                //kein Datensatz gefunden
                                echo '<h2>Kein Datensatz wurde gefunden</h2>';
                            }

                                foreach($votings as $voting) {

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
                                            echo '<input type="radio" name="voting" value="antwort_1"/>' . $voting->antwort_1;
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <?php
                                            echo '<input type="radio" name="voting" value="antwort_2"/>' . $voting->antwort_2;
                                            ?>
                                        </td>
                                    </tr>

                                    <?php
                                    if ($voting->antwort_3 != '') {
                                        echo '<tr>
                                        <td>';
                                        echo '<input type="radio" name="voting" value="antwort_3"/>' . $voting->antwort_3;
                                        echo '</td>
                                    </tr>';
                                    }
                                    if ($voting->antwort_4 != '') {
                                        echo '<tr>
                                        <td>';
                                        echo '<input type="radio" name="voting" value="antwort_4"/>' . $voting->antwort_4;
                                        echo '</td>
                                    </tr>';
                                    }
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