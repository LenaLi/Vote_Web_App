<?php include("inc/session_check.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/navigation.php"); ?>



<!DOCTYPE html>
<html>
<body>
<?php
require_once("Mapper/voting_manager.php");

$votingmanager =new voting_manager();
$votings = $votingmanager->findByVotingId(9);

?>


<form action="vote_student_do.php" method="post">
    <table>

        <tr></tr>

        <?php

            if($votings==null)
            {
                //kein Datensatz gefunden
                echo '<h2>Kein Datensatz wurde gefunden</h2>';
            }

                //Schleife hier eigentlich nicht nötig, da id eindeutig und nur ein Datensatz zurückgegeben wird
                foreach($votings as $voting)
            {

        ?>
               <tr>
                   <td>
                       <?php
                       echo '<input type="radio" name="voting" value="A1"/>'.$voting->antwort_1;
                           ?>
                    </td>
               </tr>

                <tr>
                    <td>
                        <?php
                        echo '<input type="radio" name="voting" value="A2"/>'.$voting->antwort_2;
                        ?>
                    </td>
                </tr>

                <?php
                if ($voting->antwort_3!='')
                {
                    echo '<tr>
                        <td>';
                        echo '<input type="radio" name="voting" value="A2"/>'.$voting->antwort_3;
                        echo '</td>
                    </tr>';

                }
                if ($voting->antwort_4!='')
                {
                    echo '<tr>
                        <td>';
                    echo '<input type="radio" name="voting" value="A2"/>'.$voting->antwort_4;
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

</body>
</html>